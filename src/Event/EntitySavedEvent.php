<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\Entity\Movie; // Remplacez YourEntity par le nom de votre entité

class EntitySavedEvent extends Event
{
    private $entity;

    public function __construct(Movie $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity()
    {
        return $this->entity;
    }
}