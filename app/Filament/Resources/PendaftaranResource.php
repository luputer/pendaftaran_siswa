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

    protected static ?string $navigationLabel = 'Pendaftaran';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Select untuk NISN dan set nama otomatis
                Select::make('nisn')
                    ->relationship('siswa', 'nisn')
                    ->required()
                    ->label('NISN')
                    ->afterStateUpdated(function ($set, $state) {
                        // Mengambil data siswa berdasarkan nisn yang dipilih
                        $siswa = Siswa::find($state);
                        if ($siswa) {
                            $set('nama', $siswa->nama); // Mengatur nama siswa setelah memilih NISN
                        } else {
                            $set('nama', null); // Jika siswa tidak ditemukan, kosongkan nama
                        }
                    }),

                // Field Nama siswa
                TextInput::make('nama')
                    ->required()
                    ->maxLength(50)
                    ->live(),

                // Field Tanggal Daftar
                DatePicker::make('tgl_daftar')
                    ->required()
                    ->default(now()), // Set default ke tanggal saat ini

                // Field Status pendaftaran
                TextInput::make('status')
                    ->required()
                    ->maxLength(30)
                    ->default('pending'), // Set status default ke "pending"
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom NISN
                TextColumn::make('nisn')
                    ->label('NISN'),

                // Kolom Tanggal Daftar
                TextColumn::make('tgl_daftar')
                    ->label('Tanggal Daftar')
                    ->dateTime(), // Menampilkan tanggal dalam format datetime

                // Kolom Status
                TextColumn::make('status'),

                // Kolom Nama Siswa (menggunakan relasi)
                TextColumn::make('siswa.nama')
                    ->label('Nama Siswa'), // Mengambil nama siswa dari relasi
            ])
            ->filters([/* Filter bisa ditambahkan di sini jika diperlukan */])
            ->actions([
                // Aksi Edit
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Aksi Bulk Delete
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Jika ada relasi lain yang perlu dikelola, bisa ditambahkan di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            // Definisi rute untuk halaman daftar, tambah, dan edit
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
