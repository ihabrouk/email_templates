<?php

namespace Ihabrouk\EmailTemplates\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Ihabrouk\EmailTemplates\Models\EmailTemplate;

class TemplateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The template instance.
     */
    protected EmailTemplate $template;

    /**
     * The template data.
     */
    protected array $templateData;

    /**
     * Create a new message instance.
     */
    public function __construct(EmailTemplate $template, array $templateData = [])
    {
        $this->template = $template;
        $this->templateData = $templateData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = $this->parseTemplate($this->template->subject, $this->templateData);
        $content = $this->parseTemplate($this->template->body, $this->templateData);

        return $this->subject($subject)
            ->html($content);
    }

    /**
     * Parse the template with data.
     */
    protected function parseTemplate(string $template, array $data): string
    {
        // Simple placeholder replacement
        $parsed = $template;
        
        foreach ($data as $key => $value) {
            if (is_string($value) || is_numeric($value)) {
                $parsed = str_replace('{{ $' . $key . ' }}', $value, $parsed);
                $parsed = str_replace('{{$' . $key . '}}', $value, $parsed);
            }
        }

        return $parsed;
    }
}
