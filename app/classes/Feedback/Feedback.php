<?php

namespace App\Feedback;

use Core\DataHolder;

class Feedback extends DataHolder
{
    protected array $properties = [
        'id',
        'comment',
        'date'
    ];

    public function setId(?string $id)
    {
        $this->data['id'] = $id;
    }

    public function getId()
    {
        return $this->data['id'] ?? null;
    }

    public function setComment(?string $comment)
    {
        $this->data['comment'] = $comment;
    }

    public function getComment()
    {
        return $this->data['comment'] ?? null;
    }

    public function setDate(?string $date)
    {
        $this->data['date'] = $date;
    }

    public function getDate()
    {
        return $this->data['date'] ?? null;
    }
}