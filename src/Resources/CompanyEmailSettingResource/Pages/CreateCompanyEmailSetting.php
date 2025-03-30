<?php

namespace Ihabrouk\EmailTemplates\Resources\CompanyEmailSettingResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Ihabrouk\EmailTemplates\Resources\CompanyEmailSettingResource;

class CreateCompanyEmailSetting extends CreateRecord
{
    protected static string $resource = CompanyEmailSettingResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}