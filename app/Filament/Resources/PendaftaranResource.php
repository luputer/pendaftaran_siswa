<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Pendaftaran;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PendaftaranResource\Pages;
use App\Filament\Resources\PendaftaranResource\RelationManagers;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('nisn')
                    ->relationship('siswa', 'nisn')
                    ->required()
                    ->label('NISN')
                    ->afterStateUpdated(function ($set, $state) {
                        $siswa = Siswa::find($state);
                        if ($siswa) {
                            $set('nama', $siswa->nama);
                        } else {
                            $set('nama', null);
                        }
                    }),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(50)
                    ->live(),
                DatePicker::make('tgl_daftar')
                    ->required()
                    ->default(now()), // Set default value to current date/time
                TextInput::make('status')
                    ->required()
                    ->maxLength(30)
                    ->default('pending'), // Set default status
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nisn')
                    ->label('NISN'),
                TextColumn::make('tgl_daftar')
                    ->label('Tanggal Daftar')
                    ->dateTime(), // Ensure it displays as a datetime
                TextColumn::make('status'),
                TextColumn::make('siswa.nama')
                    ->label('Nama Siswa'), // Display Nama Siswa using TextColumn
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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
