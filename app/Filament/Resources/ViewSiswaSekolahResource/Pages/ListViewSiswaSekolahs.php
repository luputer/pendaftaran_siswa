<?php

namespace App\Filament\Resources\ViewSiswaSekolahResource\Pages;

use App\Filament\Resources\ViewSiswaSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListViewSiswaSekolahs extends ListRecords
{
    protected static string $resource = ViewSiswaSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
