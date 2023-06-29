<?php

namespace Chat\Helpers;

class ReadChatHelper extends AbstractChatHelper
{
    public function readChat(): ?string
    {
        $message = $this->get();

        return $message?->getMessage();
    }
}