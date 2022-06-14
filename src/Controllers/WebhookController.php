<?php
namespace Diagro\Webhooks\Server\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebhookController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            'url' => 'required|string',
            'signed_secret' => 'required|string|max:30'
        ]);


    }

}