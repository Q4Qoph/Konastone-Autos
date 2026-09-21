<?php

namespace App\Actions\Admin;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Throwable;

class StoreVehicleImagesAction
{
    /**
     * @param  array<int, string>  $paths
     */
    public function handle(Vehicle $vehicle, array $paths, User $user, string $disk = 'r2'): void
    {
        $paths = array_values(array_filter($paths, is_string(...)));

        if ($paths === []) {
            return;
        }

        if (($vehicle->images()->count() + count($paths)) > 12) {
            throw ValidationException::withMessages([
                'images' => 'A vehicle may have a maximum of 12 images.',
            ]);
        }

        try {
            DB::transaction(function () use ($disk, $paths, $user, $vehicle): void {
                $storage = Storage::disk($disk);
                $nextOrder = (int) $vehicle->images()->max('sort_order') + 1;
                $hasCover = $vehicle->images()->where('is_cover', true)->exists();
                $altText = $this->altText($vehicle);

                foreach ($paths as $path) {
                    $vehicle->images()->create([
                        'disk' => $disk,
                        'path' => $path,
                        'original_name' => basename($path),
                        'mime_type' => rescue(fn (): ?string => $storage->mimeType($path), null, false),
                        'file_size' => rescue(fn (): ?int => $storage->size($path), null, false),
                        'checksum' => rescue(fn (): ?string => $storage->checksum($path), null, false),
                        'variants' => ['original' => $path],
                        'alt_text' => $altText,
                        'sort_order' => $nextOrder++,
                        'is_cover' => ! $hasCover,
                        'uploaded_by' => $user->id,
                    ]);

                    $hasCover = true;
                }
            });
        } catch (Throwable $exception) {
            foreach ($paths as $path) {
                rescue(fn (): bool => Storage::disk($disk)->delete($path), false);
            }

            throw $exception;
        }
    }

    private function altText(Vehicle $vehicle): string
    {
        return trim(implode(' ', array_filter([
            $vehicle->year,
            $vehicle->brand()->value('name'),
            $vehicle->model,
        ])));
    }
}
