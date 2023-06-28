<?php

namespace Chat\Helpers;

use Chat\Models\ChatMessage;
use Chat\Repository\ChatRepository;
use Nacho\ORM\RepositoryInterface;
use Nacho\ORM\RepositoryManager;

abstract class AbstractChatHelper
{
    protected RepositoryInterface $chatRepo;

    public function __construct()
    {
        $this->chatRepo = RepositoryManager::getInstance()->getRepository(ChatRepository::class);
    }

    protected function get(): ?ChatMessage
    {
        return $this->chatRepo->getById(1);
    }

    public function set(ChatMessage $message): void
    {
        $this->chatRepo->set($message);
    }
}