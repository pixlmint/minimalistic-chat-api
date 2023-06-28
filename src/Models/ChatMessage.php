<?php

namespace Chat\Models;

use Nacho\Contracts\ArrayableInterface;
use Nacho\ORM\AbstractModel;
use Nacho\ORM\ModelInterface;
use Nacho\ORM\TemporaryModel;

class ChatMessage extends AbstractModel implements ArrayableInterface, ModelInterface
{
    private ?string $message;
    private ?int $datePostedStamp;

    public function __construct(string $message, ?int $datePostedStamp)
    {
        $this->id = 1;
        $this->message = $message;
        $this->datePostedStamp = $datePostedStamp;
    }

    public static function init(TemporaryModel $data, int $id): ModelInterface
    {
        return new ChatMessage($data->get('message'), $data->get('datePostedStamp'));
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getDatePostedStamp(): ?int
    {
        return $this->datePostedStamp;
    }

    public function setDatePostedStamp(int $datePostedStamp): void
    {
        $this->datePostedStamp = $datePostedStamp;
    }

    public function getDatePosted(): ?\DateTime
    {
        if ($this->datePostedStamp) {
            return date_timestamp_set(new \DateTime(), $this->datePostedStamp);
        }

        return null;
    }

    public function setDatePosted(\DateTime $datePosted): void
    {
        $this->datePostedStamp = $datePosted->getTimestamp();
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'message' => $this->message,
            'datePostedStamp' => $this->datePostedStamp,
        ]);
    }
}