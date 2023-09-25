<?php

namespace App\EventSubscriber;

use App\Entity\Movie;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Event\EntitySavedEvent;

class EntitySavedEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
        ];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        // Vérifiez si l'entité est de type YourEntity (à adapter selon votre entité)
        if ($entity instanceof Movie) {
            $event = new EntitySavedEvent($entity);
            // Déclenchez l'événement
            $args->getObjectManager()->getEventManager()->dispatchEvent($event);
        }
    }
}