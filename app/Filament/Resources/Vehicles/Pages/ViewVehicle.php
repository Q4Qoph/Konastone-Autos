<?php

namespace App\Filament\Resources\Vehicles\Pages;

use App\Filament\Resources\Vehicles\VehicleResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewVehicle extends ViewRecord
{
    protected static string $resource = VehicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('backToVehicles')
                ->label('Back to vehicles')
                ->icon(Heroicon::OutlinedArrowLeft)
                ->color('gray')
                ->url(VehicleResource::getUrl('index')),
            EditAction::make(),
        ];
    }
}
