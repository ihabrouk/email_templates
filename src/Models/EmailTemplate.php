<?php

namespace Ihabrouk\EmailTemplates\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'body',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}