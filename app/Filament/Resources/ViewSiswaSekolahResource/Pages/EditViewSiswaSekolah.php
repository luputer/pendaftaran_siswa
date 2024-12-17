<?php

namespace App\Filament\Resources\ViewSiswaSekolahResource\Pages;

use App\Filament\Resources\ViewSiswaSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditViewSiswaSekolah extends EditRecord
{
    protected static string $resource = ViewSiswaSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
