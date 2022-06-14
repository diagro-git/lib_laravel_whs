<?php
namespace Diagro\Webhooks\Server;

use Diagro\Webhooks\Server\Models\WebhookClient;
use Illuminate\Events\Dispatcher;
use Spatie\WebhookServer\WebhookCall;

/**
 * App\Listeners\Webhooks should extend from this base class.
 * Every event that is emitted in the app for webhooks,
 * should be defined in the child class.
 */
abstract class Subscriber
{

    /**
     * Name of the connection
     *
     * @var string|null
     */
    protected ?string $connection = null;

    /**
     * Name of the queue
     *
     * @var string|null
     */
    protected ?string $queue = null;


    protected function sendEventToWebhooks(array $payload, bool $sync = false)
    {
        /** @var WebhookClient $whc */
        foreach(WebhookClient::all() as $whc) {
            $wc = $this->factoryWebhookCall($whc, $payload);
            if($sync === false) {
                $wc->dispatch();
            } else {
                $wc->dispatchSync();
            }
        }
    }

    private function factoryWebhookCall(WebhookClient $whc, array $payload): WebhookCall
    {
        return WebhookCall::create()
            ->withHeaders(['x-backend-token' => env('DIAGRO_BACKEND_TOKEN')])
            ->payload($payload)
            ->url($whc->url)
            ->useSecret($whc->signed_secret)
            ->onConnection($this->connection)
            ->onQueue($this->queue)
            ->verifySsl();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     * @return void
     */
    abstract public function subscribe(Dispatcher $events);

}