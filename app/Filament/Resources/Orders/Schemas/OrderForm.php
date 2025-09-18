<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Wizard\Step::make('Main Data')
                        ->schema([
                            Select::make('user.name')
                                ->relationship('user', 'name')
                                ->preload()
                                ->required(),
                            Select::make('product.name')
                                ->relationship('product', 'name')
                                ->preload()
                                ->required(),
                        ]),
                    Wizard\Step::make('Price')
                        ->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('$'),
                        ])
                ])
            ]);
    }
}
