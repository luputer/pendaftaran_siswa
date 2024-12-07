<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\SiswaResource\Pages;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Siswa';
    protected static ?string $modelLabel = 'Siswa';
    protected static ?string $pluralModelLabel = 'Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nisn')
                    ->required()
                    ->unique(ignorable: fn($record) => $record)
                    ->maxLength(30),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(30),
                Forms\Components\DatePicker::make('tgl_lahir')
                    ->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->required()
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('nama_orang_tua') // Tambahkan field
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('no_telp')
                    ->required()
                    ->tel()
                    ->maxLength(15),
                Forms\Components\TextInput::make('sekolah_asal')
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('nilai_ujian')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                Forms\Components\FileUpload::make('ijazah')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                    ->maxSize(2048) // 2MB
                    ->disk('public')
                    ->directory('uploads/ijazah'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nisn')->searchable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('tgl_lahir')->date(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('nama_orang_tua'), // Tambahkan kolom
                Tables\Columns\TextColumn::make('no_telp'),
                Tables\Columns\TextColumn::make('sekolah_asal'),
                Tables\Columns\TextColumn::make('nilai_ujian'),
                Tables\Columns\ImageColumn::make('ijazah')
                    ->disk('public')
                    ->url(fn($record) => Storage::url('uploads/ijazah/' . $record->ijazah)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
