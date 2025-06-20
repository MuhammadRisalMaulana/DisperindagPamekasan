<?php

namespace App\Helpers;

use Telegram\Bot\Api;

class TelegramHelper
{
    protected static $telegram;

    public static function getTelegram()
    {
        if (!self::$telegram) {
            self::$telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        }
        return self::$telegram;
    }

    public static function sendMessage($chatId, $message)
    {
        return self::getTelegram()->sendMessage([
            'chat_id' => $chatId,
            'parse_mode' => 'HTML',
            'text' => $message,
        ]);
    }
}
