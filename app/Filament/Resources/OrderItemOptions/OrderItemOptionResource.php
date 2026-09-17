<?php

namespace App\Filament\Resources\OrderItemOptions;

use App\Filament\Resources\OrderItemOptions\Pages\CreateOrderItemOption;
use App\Filament\Resources\OrderItemOptions\Pages\EditOrderItemOption;
use App\Filament\Resources\OrderItemOptions\Pages\ListOrderItemOptions;
use App\Filament\Resources\OrderItemOptions\Schemas\OrderItemOptionForm;
use App\Filament\Resources\OrderItemOptions\Tables\OrderItemOptionsTable;
use App\Models\OrderItemOption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OrderItemOptionResource extends Resource
{
    protected static ?string $model = OrderItemOption::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OrderItemOptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrderItemOptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrderItemOptions::route('/'),
            'create' => CreateOrderItemOption::route('/create'),
            'edit' => EditOrderItemOption::route('/{record}/edit'),
        ];
    }
}
