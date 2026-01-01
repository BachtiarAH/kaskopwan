<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('debit')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('credit')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('saldo')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
