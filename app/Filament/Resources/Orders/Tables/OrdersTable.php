<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Models\Order;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Checkbox;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('product.name'),
                TextColumn::make('price')
                    ->money()
                    ->summarize(Sum::make()->money('USD', 100)),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultGroup('product.name')
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    // Show is_completed withing a modal 
                    Action::make('Is Completed ?')
                        ->icon(Heroicon::OutlinedCheckBadge)
                        ->fillForm(function (Order $order) {
                            return ['is_completed' => $order->is_completed];
                        })
                        ->schema([
                            Checkbox::make('is_completed'),
                        ])
                        ->action(function (array $data, Order $order): void {
                            $order->update(['is_completed' => $data['is_completed']]);
                        }),

                    // Single is_completed action
                    // Action::make('Mark Completed')
                    //     ->requiresConfirmation()
                    //     ->icon(Heroicon::OutlinedCheckBadge)
                    //     ->hidden(fn(Order $record) => $record->is_completed)
                    //     ->action(fn(Order $record) => $record->update(['is_completed' => true])),
                    BulkAction::make('Mark as Completed')
                        ->icon(Heroicon::OutlinedCheckBadge)
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each->update(['is_completed' => true]))
                        ->deselectRecordsAfterCompletion(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
