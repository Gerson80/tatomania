<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\EncuestaRelationManager;

use App\Filament\Resources\UserResource\RelationManagers\VivenciasRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\PublicacionesRelationManager;
use App\Models\User;
use App\Models\Encuesta;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\Text;
use Filament\Tables\Columns\Relation;
use Filament\Tables\Filters\InputFilter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('admision')
                ->options([
                    'no' => 'No',
                    'si' => 'Sí',
                ])
                ->required()->label('Admisión'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('last_name'),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('admision'),
            
           
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('admision')
                ->options([
                    'no' => 'No admitido',
                    'si' => 'Admitido',
                ]),
                
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\EncuestaRelationManager::class,
            RelationManagers\VivenciasRelationManager::class,
            RelationManagers\PublicacionesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
