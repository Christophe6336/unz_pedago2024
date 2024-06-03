<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public function sendTelegramNotification($chat_id, $message)
    {
        $response = Http::post("127.0.0.1:8000/notify-teacher", [
            'chat_id' => $chat_id,
            'message' => $message,
        ]);

        return $response;
    }
}
