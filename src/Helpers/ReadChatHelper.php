<?php

namespace Chat\Helpers;

class ReadChatHelper extends AbstractChatHelper
{
    public function readChat():?string
    {
        return $this->get()->getMessage();
    }
}