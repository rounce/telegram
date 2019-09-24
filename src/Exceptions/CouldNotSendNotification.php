<?php

namespace NotificationChannels\Telegram\Exceptions;

use GuzzleHttp\Exception\ClientException;

class CouldNotSendNotification extends \Exception
{
    /**
     * Thrown when there's a bad request and an error is responded.
     *
     * @param ClientException $exception
     *
     * @return static
     */
    public static function telegramRespondedWithAnError(ClientException $exception)
    {
        return $exception;
    }

    /**
     * Thrown when there's no bot token provided.
     *
     * @param string $message
     *
     * @return static
     */
    public static function telegramBotTokenNotProvided($message)
    {
        return new static($message);
    }

    /**
     * Thrown when we're unable to communicate with Telegram.
     *
     * @return static
     */
     public static function couldNotCommunicateWithTelegram($message)
    {
        return new static("The communication with Telegram failed. `{$message}`");
    }

    /**
     * Thrown when there is no chat id provided.
     *
     * @return static
     */
    public static function chatIdNotProvided()
    {
        return new static('Telegram notification chat ID was not provided. Please refer usage docs.');
    }
}
