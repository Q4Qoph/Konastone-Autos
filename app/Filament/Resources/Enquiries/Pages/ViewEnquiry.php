<?php

namespace App\Filament\Resources\Enquiries\Pages;

use App\Filament\Resources\Enquiries\EnquiryResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewEnquiry extends ViewRecord
{
    protected static string $resource = EnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('backToEnquiries')
                ->label('Back to enquiries')
                ->icon(Heroicon::OutlinedArrowLeft)
                ->color('gray')
                ->url(EnquiryResource::getUrl('index')),
            EditAction::make(),
        ];
    }
}
