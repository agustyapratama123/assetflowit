<?php

namespace App\Filament\Resources\UserIpAddressResource\Pages;

use App\Filament\Resources\UserIpAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserIpAddresses extends ListRecords
{
    protected static string $resource = UserIpAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
