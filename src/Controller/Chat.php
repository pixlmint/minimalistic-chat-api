<?php

namespace Chat\Controller;

use Chat\Helpers\ReadChatHelper;
use Chat\Helpers\WriteChatHelper;
use Nacho\Controllers\AbstractController;
use Nacho\Models\HttpMethod;
use Nacho\Models\Request;

class Chat extends AbstractController
{
    public function read(): string
    {
        $helper = new ReadChatHelper();

        return $this->json([$helper->readChat()]);
    }

    public function write(Request $request): string
    {
        $helper = new WriteChatHelper();
        if (strtoupper($request->requestMethod) !== HttpMethod::POST) {
            return $this->json(['error' => 'Only POST requests allowed'], 405);
        }
        if (!key_exists('chat', $request->getBody())) {
            return $this->json(['error' => 'Please define a chat body'], 400);
        }
        if (!$helper->verifyLastPostedDate()) {
            return $this->json(['error' => 'You are not allowed to post so frequently, please try again later'], 401);
        }

        $message = $request->getBody()['chat'];

        $helper->writeMessage($message);

        return $this->json([$message]);
    }
}