<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderSimpleResource\Pages;
use App\Filament\Resources\OrderSimpleResource\RelationManagers;
use App\Models\OrderSimple;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderSimpleResource extends Resource
{
    protected static ?string $model = OrderSimple::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Repeater::make('items')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('quantity')
                            ->mask( // Commenting this out, will make it work
                                fn (TextInput\Mask $mask) => $mask
                                    ->numeric()
                            ),
                        Select::make('role')
                            ->options([
                                'member' => 'Member',
                                'administrator' => 'Administrator',
                                'owner' => 'Owner',
                            ])
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOrderSimples::route('/'),
        ];
    }
}
