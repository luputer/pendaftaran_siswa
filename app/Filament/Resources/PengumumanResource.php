<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use App\Models\Pengumuman;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengumumanResource\Pages;
use App\Filament\Resources\PengumumanResource\RelationManagers;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('id_pendaftaran')
                ->relationship('pendaftaran', 'id')
                ->required(),
            Forms\Components\Select::make('nisn')
                ->relationship('siswa', 'nisn')->options(Siswa::all()->pluck('nisn', 'nisn'))
                ->required()->label('NISN'),
            Forms\Components\TextInput::make('nama')
                ->required()->maxLength(50),
            Forms\Components\TextInput::make('judul')
                ->required()->maxLength(100),
            Forms\Components\TextInput::make('hasil')
                ->required()->maxLength(100),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([Tables\Columns\TextColumn::make('pendaftaran.id')->label('ID Pendaftaran'), Tables\Columns\TextColumn::make('nisn')->label('NISN'), Tables\Columns\TextColumn::make('nama')->label('Nama'), Tables\Columns\TextColumn::make('judul')->label('Judul'), Tables\Columns\TextColumn::make('hasil')->label('Hasil'), Tables\Columns\TextColumn::make('created_at')->dateTime(), Tables\Columns\TextColumn::make('updated_at')->dateTime(),])
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
            'index' => Pages\ListPengumumen::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
