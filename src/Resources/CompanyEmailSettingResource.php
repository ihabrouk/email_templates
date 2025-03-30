<?php

namespace Ihabrouk\EmailTemplates\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Ihabrouk\EmailTemplates\Models\CompanyEmailSetting;
use Ihabrouk\EmailTemplates\Resources\CompanyEmailSettingResource\Pages;

class CompanyEmailSettingResource extends Resource
{
    protected static ?string $model = CompanyEmailSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    
    protected static ?string $navigationLabel = 'Email Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('from_email')
                    ->email()
                    ->label('From Email')
                    ->placeholder('noreply@example.com')
                    ->required(),
                Forms\Components\TextInput::make('from_name')
                    ->label('From Name')
                    ->placeholder('Company Name')
                    ->required(),
                Forms\Components\TextInput::make('reply_to_email')
                    ->email()
                    ->label('Reply To Email')
                    ->placeholder('support@example.com'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('from_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reply_to_email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyEmailSettings::route('/'),
            'create' => Pages\CreateCompanyEmailSetting::route('/create'),
            'edit' => Pages\EditCompanyEmailSetting::route('/{record}/edit'),
        ];
    }
}