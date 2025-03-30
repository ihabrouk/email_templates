# Email Templates for FilamentPHP

A FilamentPHP plugin for managing email templates in Laravel applications.

## Introduction

Email Templates provides an intuitive interface for creating, editing, and managing email templates directly within the FilamentPHP admin panel. This allows content managers and developers to easily customize email notifications without touching code.

## Features

- Powerful WYSIWYG editor for creating rich email templates
- Variable support for dynamic content
- Template previewing functionality
- Easy integration with Laravel Mail
- Filament-native interface

## Requirements

- PHP 8.3+
- Laravel 10+
- FilamentPHP 3.3+

## Installation

You can install the package via composer:

```bash
composer require ihabrouk/email_templates
```

After installation, publish the migrations:

```bash
php artisan vendor:publish --tag="email-templates-migrations"
php artisan migrate
```

You can optionally publish the config file:

```bash
php artisan vendor:publish --tag="email-templates-config"
```

## Usage

### Accessing Email Templates

Once installed, you'll see an "Email Templates" item in your Filament navigation panel.

### Creating a Template

1. Navigate to Email Templates in the Filament admin panel
2. Click "New Template"
3. Fill in the template details:
   - Name: A descriptive name for your template
   - Subject: The email subject line
   - Body: The content of your email

### Using Variables

You can use variables in your templates with double curly braces:

```
Hello {{ $user->name }},

Thank you for your order #{{ $order->id }}.
```

### Sending Emails with Templates

```php
use Ihabrouk\EmailTemplates\Services\EmailSender;

// Using the template name
EmailSender::send('welcome-email', [
    'user' => $user,
    'company' => $company
], 'user@example.com');

// Or using the template ID
EmailSender::sendById(1, [
    'user' => $user,
    'company' => $company
], 'user@example.com');
```

## Customization

### Custom Template Variables

You can define your own variables and their sample values by publishing the config file and updating the `variables` section.

## Contributing

Contributions are welcome and will be fully credited.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
