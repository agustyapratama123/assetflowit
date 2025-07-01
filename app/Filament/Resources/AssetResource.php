<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetResource\Pages;
use App\Filament\Resources\AssetResource\RelationManagers;
use App\Models\Asset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Asset';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('asset_tag')
                ->label('Asset Tag')
                ->required()
                ->unique()
                ->maxLength(50),

                TextInput::make('name')
                    ->label('Nama Aset')
                    ->required()
                    ->maxLength(100),

                TextInput::make('quantity')
                    ->label('Jumlah Unit')
                    ->numeric()
                    ->required()
                    ->minValue(1),

                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                ]),

                Select::make('vendor_id')
                    ->label('Vendor')
                    ->relationship('vendor', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('location_id')
                    ->label('Lokasi')
                    ->relationship('location', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('user_id')
                    ->label('Pengguna')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('asset_status_id')
                    ->label('Status Aset')
                    ->relationship('status', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make('purchase_date')
                    ->label('Tanggal Pembelian')
                    ->required(),

                DatePicker::make('warranty_expiry')
                    ->label('Masa Garansi')
                    ->nullable(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->nullable(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset_tag')->label('Tag')->sortable()->searchable(),
                TextColumn::make('name')->label('Nama')->sortable()->searchable(),
                TextColumn::make('quantity')->label('Jumlah')->sortable(),
                TextColumn::make('category.name')->label('Kategori'),
                TextColumn::make('vendor.name')->label('Vendor'),
                TextColumn::make('location.name')->label('Lokasi'),
                TextColumn::make('user.name')->label('Pengguna'),
                TextColumn::make('status.name')->label('Status'),
                TextColumn::make('purchase_date')->label('Beli')->date(),
                TextColumn::make('warranty_expiry')->label('Garansi')->date(),
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
            'index' => Pages\ListAssets::route('/'),
            // 'create' => Pages\CreateAsset::route('/create'),
            // 'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
