<?php

namespace NotificationChannels\Telegram\Exceptions;

use Exception;
use GuzzleHttp\Exception\ClientException;

/**
 * Class CouldNotSendNotification.
 */
class CouldNotSendNotification extends Exception
{
    /**
     * Thrown when there's a bad request and an error is responded.
     *
     * @param ClientException $exception
     *
     * @return static
     */
    public static function telegramRespondedWithAnError(ClientException $exception): self
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
    public static function telegramBotTokenNotProvided($message): self
    {
        return new static($message);
    }

    /**
     * Thrown when we're unable to communicate with Telegram.
     *
     * @param $message
     *
     * @return static
     */
    public static function couldNotCommunicateWithTelegram($message): self
    {
        return new static("The communication with Telegram failed. `{$message}`");
    }

    /**
     * Thrown when there is no chat id provided.
     *
     * @return static
     */
    public static function chatIdNotProvided(): self
    {
        return new static('Telegram notification chat ID was not provided. Please refer usage docs.');
    }
}
