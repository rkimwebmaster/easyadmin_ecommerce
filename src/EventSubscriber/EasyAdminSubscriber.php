<?php 
# src/EventSubscriber/EasyAdminSubscriber.php
namespace App\EventSubscriber;

use App\Entity\BlogPost;
use App\Entity\Categorie;
use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    // private $slugger;

    // public function __construct($slugger)
    // {
    //     $this->slugger = $slugger;
    // }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setUpdatedAt'],
        ];
    }

    public function setCreatedAt(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();
        
        if (!($entity instanceof Categorie or $entity instanceof Produit )) {
            return;
        }

        $entity->setCreatedAt(new \DateTimeImmutable());

    }

    public function setUpdatedAt(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();
        
        if (!($entity instanceof Categorie or $entity instanceof Produit )) {
            return;
        }

        $entity->setUpdatedAt(new \DateTimeImmutable());

    }
}