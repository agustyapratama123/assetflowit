<?php

namespace App\Filament\Resources\UserIpAddressResource\Pages;

use App\Filament\Resources\UserIpAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserIpAddress extends EditRecord
{
    protected static string $resource = UserIpAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
