<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('staff_id')
                    ->relationship('staff', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('order_type'),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
            ]);
    }
}
