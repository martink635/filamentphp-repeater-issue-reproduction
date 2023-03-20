<?php

namespace App\Filament\Resources\OrderSimpleResource\Pages;

use App\Filament\Resources\OrderSimpleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOrderSimples extends ManageRecords
{
    protected static string $resource = OrderSimpleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
