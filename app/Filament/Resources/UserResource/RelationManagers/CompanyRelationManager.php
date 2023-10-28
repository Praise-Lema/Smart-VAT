<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Region;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class CompanyRelationManager extends RelationManager
{
    protected static string $relationship = 'companies';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {

        $url = url()->previous();
        $user_id = substr($url, 32, 1);
        
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address'),
                Forms\Components\Select::make('region')
                    ->options(Region::all()->pluck('name', 'name'))
                    ->disablePlaceholderSelection(),
                    Forms\Components\TextInput::make('user_id')->label('User')
                    ->default($user_id)->hidden(),        
                    // Forms\Components\Select::make('User.name')->label('User')
                    // ->options(User::all()->pluck('name', 'id'))
                    // ->disablePlaceholderSelection(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('region'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
