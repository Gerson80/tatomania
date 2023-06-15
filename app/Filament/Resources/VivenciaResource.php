<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VivenciaResource\Pages;
use App\Filament\Resources\VivenciaResource\RelationManagers;
use App\Models\Vivencia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VivenciaResource extends Resource
{
    protected static ?string $model = vivencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('vivencia'),
                //
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVivencias::route('/'),
            'create' => Pages\CreateVivencia::route('/create'),
            'edit' => Pages\EditVivencia::route('/{record}/edit'),
        ];
    }    
}
