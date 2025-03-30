<?php

namespace Ihabrouk\EmailTemplates\Resources\CompanyEmailSettingResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Ihabrouk\EmailTemplates\Resources\CompanyEmailSettingResource;

class EditCompanyEmailSetting extends EditRecord
{
    protected static string $resource = CompanyEmailSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}