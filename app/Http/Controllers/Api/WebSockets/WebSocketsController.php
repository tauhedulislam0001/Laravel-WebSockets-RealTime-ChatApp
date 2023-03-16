<?php

namespace App\Http\Controllers\Api\WebSockets;

use App\Http\Controllers\Controller;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Pusher\Pusher;

class WebSocketsController extends Controller
{
    public function connect(Request $request) 
    {
        $broadcaster = new PusherBroadcaster(
            new Pusher(
                env("PUSHER_APP_KEY"),
                env("PUSHER_APP_SECRET"),
                env("PUSHER_APP_ID"),
                []
            )
        );

        return $broadcaster->validAuthenticationResponse($request, []);
    }
}
