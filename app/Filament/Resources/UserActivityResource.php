<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserActivityResource\Pages;
use App\Filament\Resources\UserActivityResource\RelationManagers;
use App\Models\UserActivity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;

class UserActivityResource extends Resource
{
    protected static ?string $model = UserActivity::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Manajemen Aktivitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('User')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

                DatePicker::make('activity_date')
                    ->label('Tanggal Aktivitas')
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User')->sortable()->searchable(),
                TextColumn::make('activity_date')->label('Tanggal')->date(),
                TextColumn::make('description')->label('Deskripsi')->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUserActivities::route('/'),
            'create' => Pages\CreateUserActivity::route('/create'),
            'edit' => Pages\EditUserActivity::route('/{record}/edit'),
        ];
    }
}
