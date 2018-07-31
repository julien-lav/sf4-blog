<?php 

namespace App\EventListener;

use Doctrine\Common\EventSubscriber;
use App\EventListener\MyEventListener;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use App\Entity\User;

class SearchIndexerSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            'blogPersist',
            'blogUpdate',
        );
    }

    public function blogUpdate(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function blogPersist(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function index(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof User) {
            $entityManager = $args->getEntityManager();
            die('youhou');
        }
    }
}