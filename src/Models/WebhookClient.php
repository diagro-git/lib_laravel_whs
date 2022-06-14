<?php
namespace Diagro\Webhooks\Server\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookClient extends Model
{

    protected $fillable = [
        'url',
        'signed_secret',
    ];

    protected $casts = [
        'signed_secret' => 'encrypted'
    ];

}