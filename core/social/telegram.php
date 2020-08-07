<?php

namespace Core\Social;


class Telegram
{
    public function message($token, $chat_id, $massanger) {
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage',
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => $chat_id,
                'text' => $massanger,
            ),
        )
        );
        curl_exec($ch);
    }
}
?>