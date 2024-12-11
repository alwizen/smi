<?php

namespace App\Filament\Widgets;

use App\Models\Candidate;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kandidat', Candidate::count())
                ->description('Jumlah semua kandidat')
                ->color('secondary'),

            Stat::make('Kandidat Pending', Candidate::whereNull('is_valid')->count())
                ->description('Kandidat yang belum divalidasi')
                ->color('warning'),


            Stat::make('Kandidat Valid', Candidate::where('is_valid', true)->count())
                ->description('Jumlah kandidat yang valid')
                ->color('success'),

            Stat::make('Kandidat Tidak Valid', Candidate::where('is_valid', false)->count())
                ->description('Jumlah kandidat yang tidak valid')
                ->color('danger'),

                    ];
    }
}
