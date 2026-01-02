<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalCard extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Transactions', 'total_transactions')
                ->label('Total Transactions')
                ->value(\App\Models\Transaction::count()),
            Stat::make('Total Debit', 'total_debit')
                ->label('Total Debit')
                ->value('Rp ' . number_format(\App\Models\Transaction::sum('debit'), 0, ',', '.')),
            Stat::make('Total Credit', 'total_credit')
                ->label('Total Credit')
                ->value('Rp ' . number_format(\App\Models\Transaction::sum('credit'), 0, ',', '.')),
            Stat::make('Current Balance', 'current_balance')
                ->label('Current Balance')
                ->value('Rp ' . number_format(\App\Models\Transaction::sum('debit') - \App\Models\Transaction::sum('credit'), 0, ',', '.')),
        ];
    }
}
