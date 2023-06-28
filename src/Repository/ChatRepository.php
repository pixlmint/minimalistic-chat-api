<?php

namespace Chat\Repository;

use Chat\Models\ChatMessage;
use Nacho\ORM\AbstractRepository;
use Nacho\ORM\RepositoryInterface;

class ChatRepository extends AbstractRepository implements RepositoryInterface
{
    public static function getDataName(): string
    {
        return 'chat';
    }

    public static function getModel(): string
    {
        return ChatMessage::class;
    }
}