<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaintenanceResource\Pages;
use App\Filament\Resources\MaintenanceResource\RelationManagers;
use App\Models\Maintenance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;

class MaintenanceResource extends Resource
{
    protected static ?string $model = Maintenance::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Manajemen Asset';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('asset_id')
                ->label('Aset')
                ->relationship('asset', 'name')
                ->searchable()
                ->required(),

            Select::make('maintenance_type_id')
                ->label('Jenis Perawatan')
                ->relationship('maintenanceType', 'name')
                ->searchable()
                ->required(),

            DatePicker::make('scheduled_at')
                ->label('Tanggal Terjadwal')
                ->required(),

            DatePicker::make('completed_at')
                ->label('Tanggal Selesai')
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
                TextColumn::make('asset.name')->label('Aset')->searchable(),
                TextColumn::make('maintenanceType.name')->label('Jenis Perawatan')->sortable(),
                TextColumn::make('scheduled_at')
                    ->label('Terjadwal')
                    ->date(),

                TextColumn::make('completed_at')
                    ->label('Selesai')
                    ->date(),
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
            'index' => Pages\ListMaintenances::route('/'),
            'create' => Pages\CreateMaintenance::route('/create'),
            'edit' => Pages\EditMaintenance::route('/{record}/edit'),
        ];
    }
}
