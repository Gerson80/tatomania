<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicacionesResource\Pages;
use App\Filament\Resources\PublicacionesResource\RelationManagers;
use App\Models\Publicacionestatu;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublicacionesResource extends Resource
{
    protected static ?string $model = Publicacionestatu::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
        Select::make('Autorizado')
        ->options([
            'no' => 'No',
            'si' => 'Sí',
        ])
        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('historia'),
                Tables\Columns\TextColumn::make('categoria'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('experiencia'),
                Tables\Columns\TextColumn::make('numero'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('autorizado'),
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('autorizado')
                ->options([
                    'no' => 'No autorizado',
                    'si' => 'Autorizado',
                ]),
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
            'index' => Pages\ListPublicaciones::route('/'),
            'create' => Pages\CreatePublicaciones::route('/create'),
            'edit' => Pages\EditPublicaciones::route('/{record}/edit'),
        ];
    }    
}
