<?php

namespace Ihabrouk\EmailTemplates\Resources\EmailTemplateResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Ihabrouk\EmailTemplates\Resources\EmailTemplateResource;

class ListEmailTemplates extends ListRecords
{
    protected static string $resource = EmailTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}