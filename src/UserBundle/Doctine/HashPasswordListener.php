<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/8/2016
 * Time: 3:34 PM
 */

namespace UserBundle\Doctine;


use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class HashPasswordListener implements EventSubscriber
{

    public function prePersist(LifecycleEventArgs $arg)
    {
        $entity=$arg->getEntity;

        if(!$entity instanceof User)
        {
            return;
        }

    }


    public function getSubscribedEvents()
    {


        return ['prePersist','preUpdate'];
    }

}