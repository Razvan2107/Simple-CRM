<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Interaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class CRMOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Contatcs', Contact::count()),

            Stat::make('New Deals', Contact::where('deal_status', 'new')->count())
                ->description('Waiting for contact')
                ->color('ínfo'),

            Stat::make('In Progress', Contact::where('deal_status', 'in_progress')->count())
                ->description('Ongoing conversations')
                ->color('warning'),

            Stat::make('Closed Deals', Contact::where('deal_status', 'closed')->count())
                ->description('Closed')
                ->color('success'),

            Stat::make('Total Interactions', Interaction::count())
                ->description('All notes and discussions')
                ->color('gray'),
        ];
    }

    public function getHeaderWidgets(): array{
        return [
            CRMOverview::class,
        ];
    }
}
