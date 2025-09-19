<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\Categories\Tables\CategoriesTable;
use Filament\Forms\Components\ModalTableSelect;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('price')
                    ->prefix('$'),
                // Select::make('category_id')
                //     ->relationship('category', 'name'),

                ModalTableSelect::make('category_id')
                    ->relationship('category', 'name')
                    ->tableConfiguration(CategoriesTable::class),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ]),
                Radio::make('status')
                    ->options(ProductStatusEnum::class),
                RichEditor::make('description')->columnSpan(2),

            ]);
    }
}
