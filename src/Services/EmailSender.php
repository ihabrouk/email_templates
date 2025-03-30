<?php

namespace Ihabrouk\EmailTemplates\Services;

use Illuminate\Support\Facades\Mail;
use Ihabrouk\EmailTemplates\Mail\TemplateMail;
use Ihabrouk\EmailTemplates\Models\EmailTemplate;

class EmailSender
{
    /**
     * Send an email using a template by name.
     */
    public static function send(string $templateName, array $data = [], $to = null): bool
    {
        $template = EmailTemplate::where('name', $templateName)
            ->where('active', true)
            ->first();

        if (!$template) {
            return false;
        }

        return self::sendTemplate($template, $data, $to);
    }

    /**
     * Send an email using a template by ID.
     */
    public static function sendById(int $templateId, array $data = [], $to = null): bool
    {
        $template = EmailTemplate::where('id', $templateId)
            ->where('active', true)
            ->first();

        if (!$template) {
            return false;
        }

        return self::sendTemplate($template, $data, $to);
    }

    /**
     * Send the actual email.
     */
    protected static function sendTemplate(EmailTemplate $template, array $data = [], $to = null): bool
    {
        try {
            Mail::to($to)->send(new TemplateMail($template, $data));
            return true;
        } catch (\Exception $e) {
            // Log error
            return false;
        }
    }
}
