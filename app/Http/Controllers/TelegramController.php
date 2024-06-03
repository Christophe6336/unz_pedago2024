<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function sendMessage(Request $request)
    {
        $chat_id = $request->chat_id;
        $message = $request->message;

        // Envoi du message Telegram
        Telegram::sendMessage([
            'chat_id' => $chat_id,
            'text' => $message,
        ]);

        // Envoi du message SMS via Aqilas
        $smsContent = [
            "from" => "SENDERID",
            "to" => ["+22663365637"], // Remplacez par le numéro de téléphone de destination
            "text" => $message
        ];

        $API_KEY_HERE = env('AQILAS_API_KEY'); // Récupérez votre clé API Aqilas depuis le fichier .env
        $smsContentToJson = json_encode($smsContent);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-AUTH-TOKEN' => $API_KEY_HERE
        ])->post("https://www.aqilas.com/api/v1/sms", $smsContentToJson);

        $status = $response->status();
        $responseData = $response->json();

        if ($status == 201 || $status == 200) {
            return "Message envoyé avec succès sur Telegram ({$response['bulk_id']}) et SMS avec Aqilas.";
        } else {
            return "Erreur: {$responseData['message']}";
        }
    }
}
