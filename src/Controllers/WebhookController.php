<?php
namespace Diagro\Webhooks\Server\Controllers;

use Diagro\Webhooks\Server\Models\WebhookClient;
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

        $whc = new WebhookClient($data);
        $whc->saveOrFail();
        return response()->json(['status' => 'ok']);
    }

    public function unregister(Request $request)
    {
        $data = $request->validate([
            'url' => 'required|string'
        ]);

        $whc = WebhookClient::query()->where('url', '=', $data['url'])->firstOrFail();
        $whc->deleteOrFail();
        return response()->json(['status' => 'ok']);
    }

}