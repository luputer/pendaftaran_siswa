<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ViewSiswaSekolah;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder; // Tambahkan ini
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ViewSiswaSekolahResource\Pages;
use App\Filament\Resources\ViewSiswaSekolahResource\RelationManagers;

class ViewSiswaSekolahResource extends Resource
{
    protected static ?string $model = ViewSiswaSekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'daftar';

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
                TextColumn::make('nisn')->label('NISN'),
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('sekolah_asal')->label('Sekolah Asal'),
            ])
            ->defaultSort('nisn', 'asc')
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

    // Tambahkan metode ini
    protected static function configureQuery(Builder $query): Builder
    {
        return $query->orderBy('nisn', 'asc'); // Gunakan 'nisn' sebagai urutan default
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
            'index' => Pages\ListViewSiswaSekolahs::route('/'),
            'create' => Pages\CreateViewSiswaSekolah::route('/create'),
            'edit' => Pages\EditViewSiswaSekolah::route('/{record}/edit'),
        ];
    }
}
