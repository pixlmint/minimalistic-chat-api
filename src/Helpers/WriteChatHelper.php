<?php

namespace Chat\Helpers;

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
        $now->modify('-30 seconds');
        $diff = $now->diff($lastMessage->getDatePosted());

        return $diff->invert === 1;
    }

    public function writeMessage(string $strMessage): void
    {
        $message = new ChatMessage($strMessage, time());

        $this->set($message);
    }
}