<?php

namespace Codeception\Platform;

use Codeception\CodeceptionEvents;
use Codeception\Event\TestEvent;

class Group extends Extension
{
    static $group;

    public function _before(TestEvent $e)
    {
    }

    public function _after(TestEvent $e)
    {
    }

    static function getSubscribedEvents()
    {
        $events = array();
        if (static::$group) {
            $events = array(
                CodeceptionEvents::TEST_BEFORE . '.' . static::$group => '_before',
                CodeceptionEvents::TEST_AFTER . '.' . static::$group  => '_after',
            );
        }
        $events = array_merge($events, static::$events);

        return $events;
    }
}
