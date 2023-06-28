<?php

namespace Chat\Helpers;

use Cassandra\Date;
use Chat\Models\ChatMessage;

class WriteChatHelper extends AbstractChatHelper
{
    public function verifyLastPostedDate(): bool
    {
        $lastMessage = $this->get();
        if (!$lastMessage) {
            return true;
        }
        $now = new \DateTime();
        $now->modify('-5 minutes');
        $diff = $now->diff($lastMessage->getDatePosted());

        return $diff->invert === 1;
    }

    public function writeMessage(string $strMessage)
    {
        $message = new ChatMessage($strMessage, time());

        $this->set($message);
    }
}