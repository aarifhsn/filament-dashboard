<?php

namespace App\Filament\Resources\Products\Tables;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Categories\Tables\CategoriesTable;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\ModalTableSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Laravel\Pail\Options;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('price')
                    // ->formatStateUsing(fn(int $state): float => $state / 100),
                    ->money('USD', 100),
                TextColumn::make('category.name')->searchable(),
                TextColumn::make('tags.name')->searchable(),
                TextColumn::make('status')->badge(),
                CheckboxColumn::make('is_active'),
                TextColumn::make('description'),
                TextColumn::make('created_at')->since(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(ProductStatusEnum::class),
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Filter::make('created_from')
                    ->schema([
                        DatePicker::make('created_from'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            );
                    }),
                Filter::make('created_until')
                    ->schema([
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
