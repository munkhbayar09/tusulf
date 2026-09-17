<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->relationship('order', 'order_id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => "Order #{$record->order_id}")
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('payment_method')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('transaction_ref'),
            ]);
    }
}