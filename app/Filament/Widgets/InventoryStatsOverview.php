<?php

namespace App\Filament\Widgets;

use App\Enums\VehicleStatus;
use App\Models\Enquiry;
use App\Models\Vehicle;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InventoryStatsOverview extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Available vehicles', Vehicle::query()->where('status', VehicleStatus::Available)->count())
                ->description('Published stock')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->color('success')
                ->icon(Heroicon::OutlinedTruck),
            Stat::make('Draft vehicles', Vehicle::query()->where('status', VehicleStatus::Draft)->count())
                ->description('Needs review')
                ->descriptionIcon(Heroicon::OutlinedPencilSquare)
                ->color('warning')
                ->icon(Heroicon::OutlinedDocument),
            Stat::make('Sold vehicles', Vehicle::query()->where('status', VehicleStatus::Sold)->count())
                ->description('Historical stock')
                ->descriptionIcon(Heroicon::OutlinedArchiveBox)
                ->color('gray')
                ->icon(Heroicon::OutlinedArchiveBox),
            Stat::make('New enquiries', Enquiry::query()->where('status', 'new')->count())
                ->description('Awaiting follow-up')
                ->descriptionIcon(Heroicon::OutlinedChatBubbleLeftRight)
                ->color('danger')
                ->icon(Heroicon::OutlinedInbox),
        ];
    }
}
