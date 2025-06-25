<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetAssignmentResource\Pages;
use App\Filament\Resources\AssetAssignmentResource\RelationManagers;
use App\Models\AssetAssignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateTimeColumn;

class AssetAssignmentResource extends Resource
{
    protected static ?string $model = AssetAssignment::class;
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';
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

                Select::make('user_id')
                    ->label('Pengguna')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                DateTimePicker::make('assigned_at')
                    ->label('Tanggal Penugasan')
                    ->required(),

                DateTimePicker::make('returned_at')
                    ->label('Tanggal Pengembalian')
                    ->nullable(),

                Textarea::make('note')
                    ->label('Catatan')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.name')->label('Aset'),
                TextColumn::make('user.name')->label('Pengguna'),
                TextColumn::make('assigned_at')
                    ->label('Tgl Penugasan')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('returned_at')
                    ->label('Tgl Pengembalian')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListAssetAssignments::route('/'),
            'create' => Pages\CreateAssetAssignment::route('/create'),
            'edit' => Pages\EditAssetAssignment::route('/{record}/edit'),
        ];
    }
}
