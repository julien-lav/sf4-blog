<?php

namespace App\Event\Listener;

use App\Event\FunEvent;

/**
 * 
 */
class FunEventListener
{
    public function onSomeEventName(FunEvent $event)
    {
    	echo '<p><br /> 
    			Salut !
    		  </p>';
    }

    public function onCheeseAndTomatoToasty(FunEvent $event)
    {
    	echo '<p>' . var_dump($event) . '</p>';
    }

}