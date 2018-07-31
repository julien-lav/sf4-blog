<?php

namespace App\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use App\Entity\Blog;

class SearchIndexer
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // only act on some "Product" entity
        if (!$entity instanceof Blog) {
            die('Kikou, les louploups !!');

            // return;
        }

        $entityManager = $args->getEntityManager();     
            die('Kikou, les poulets !!');
       		
           // die();
    
    }
}