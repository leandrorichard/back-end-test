<?php

namespace App\Listeners;

use App\Events\ProdutoCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ProdutoCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProdutoCreated  $event
     * @return void
     */
    public function handle(ProdutoCreated $event)
    {
        $produto = $event->produto;

        // TODO: implementar logica para enviar email
    }
}
