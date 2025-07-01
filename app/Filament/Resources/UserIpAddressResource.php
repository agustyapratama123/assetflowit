<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserIpAddressResource\Pages;
use App\Filament\Resources\UserIpAddressResource\RelationManagers;
use App\Models\UserIpAddress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateTimeColumn;

class UserIpAddressResource extends Resource
{
    protected static ?string $model = UserIpAddress::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'Manajemen Aset';
    protected static ?string $navigationLabel = 'IP Address Pengguna';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                ]),

                TextInput::make('ip_address')
                    ->label('IP Address')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(45),

                Select::make('asset_id')
                    ->relationship('asset', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Aset Terkait')
                    ->nullable(),

                Select::make('location_id')
                    ->label('Lokasi')
                    ->relationship('location', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                ]),

                DateTimePicker::make('assigned_at')
                    ->label('Waktu Penugasan')
                    ->required(),

                DateTimePicker::make('released_at')
                    ->label('Waktu Dilepas')
                    ->nullable(),

                Textarea::make('notes')
                    ->label('Catatan')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User')->sortable()->searchable(),
                TextColumn::make('ip_address')->label('IP Address')->searchable(),
                TextColumn::make('asset.name')->label('Aset')->sortable()->toggleable(),
                TextColumn::make('location.name')->label('Lokasi'),
                TextColumn::make('category.name')->label('Category'),
                TextColumn::make('assigned_at')->label('Ditugaskan')->dateTime(),
                TextColumn::make('released_at')->label('Dilepas')->dateTime()->toggleable(),
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
            'index' => Pages\ListUserIpAddresses::route('/'),
            // 'create' => Pages\CreateUserIpAddress::route('/create'),
            // 'edit' => Pages\EditUserIpAddress::route('/{record}/edit'),
        ];
    }
}
