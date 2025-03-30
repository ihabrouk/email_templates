<?php

namespace Ihabrouk\EmailTemplates\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyEmailSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_email',
        'from_name',
        'reply_to_email',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}