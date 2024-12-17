<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembayaranResource extends Resource
{
    protected static ?string $navigationLabel = 'Pembayaran';

    protected static ?string $model = Pembayaran::class;


    protected static ?string $navigationIcon = 'heroicon-o-credit-card';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('id_pendaftaran')->relationship('pendaftaran', 'id')->required(),
            Forms\Components\TextInput::make('jumlah_pembayaran')->required()->numeric(),
            Forms\Components\DatePicker::make('tanggal_pembayaran')->required(),
            Forms\Components\TextInput::make('metode_pembayaran')->required(),
            Forms\Components\Select::make('status')->options(['pending' => 'Pending', 'completed' => 'Completed', 'failed' => 'Failed'])->default('pending')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pendaftaran.id')->label('ID Pendaftaran'),
                Tables\Columns\TextColumn::make('jumlah_pembayaran')->label('Jumlah Pembayaran'),
                Tables\Columns\TextColumn::make('tanggal_pembayaran')->label('Tanggal Pembayaran'),
                Tables\Columns\TextColumn::make('metode_pembayaran')->label('Metode Pembayaran'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
