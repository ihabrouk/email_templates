<?php

namespace Ihabrouk\EmailTemplates\Resources\CompanyEmailSettingResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Ihabrouk\EmailTemplates\Resources\CompanyEmailSettingResource;

class ListCompanyEmailSettings extends ListRecords
{
    protected static string $resource = CompanyEmailSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}