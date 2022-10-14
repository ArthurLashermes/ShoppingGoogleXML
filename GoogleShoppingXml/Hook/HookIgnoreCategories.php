<?php

namespace GoogleShoppingXml\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

class HookIgnoreCategories extends BaseHook
{
    public function onHookIgnoreCategories(HookRenderEvent $event){
        $event->add($this->render(
            'ignore-categories.html'

        ));
    }
}