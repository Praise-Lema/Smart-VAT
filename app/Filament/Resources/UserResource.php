<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Awcodes\FilamentBadgeableColumn\Components\Badge;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('password')->password()->required()->hiddenOn('edit'),
                Forms\Components\Select::make('status')->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ]),
                Forms\Components\Select::make('has_paid')->options([
                    '1' => 'Paid',
                    '0' => 'Not Paid',
                ]),
                Forms\Components\Select::make('package_id')->options([
                    '1' => 'Basic',
                    '2' => 'Standard',
                    '3' => 'Pro', 
                    '4' => 'Premium',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                BadgeableColumn::make('name')
                ->badges([
                    Badge::make('status')->label('Active')
                    ->color('success')
                    ->visible(fn ($record): bool => $record->status ?? false),
                    Badge::make('has_paid')->label('Paid')
                    ->color('success')
                    ->visible(fn ($record): bool => $record->has_paid ?? false),
                ]),
                TextColumn::make('status'),
                TextColumn::make('has_paid'),
                TextColumn::make('package_id'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $user = User::find(auth()->id());
        if($user->role_id == 3){
            return User::where('reg_by_yana', 1);
        }else{
            return User::where('status', 1)->orWhere('status', 0);
        }
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
