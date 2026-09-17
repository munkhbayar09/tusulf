<?php

namespace App\Filament\Resources\OrderItems\Schemas;

use App\Models\Product;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class OrderItemForm
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
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        $product = Product::find($state);
                        if ($product) {
                            $set('unit_price', $product->price);
                            $quantity = $get('quantity') ?? 1;
                            $set('subtotal', $product->price * $quantity);
                        }
                    }),
                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(1)
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        $unitPrice = $get('unit_price') ?? 0;
                        $set('subtotal', $unitPrice * $state);
                    }),
                TextInput::make('unit_price')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        $quantity = $get('quantity') ?? 1;
                        $set('subtotal', $state * $quantity);
                    }),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->readOnly(),
            ]);
    }
}