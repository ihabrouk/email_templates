<?php

namespace Ihabrouk\EmailTemplates\Resources\EmailTemplateResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Ihabrouk\EmailTemplates\Resources\EmailTemplateResource;

class CreateEmailTemplate extends CreateRecord
{
    protected static string $resource = EmailTemplateResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}