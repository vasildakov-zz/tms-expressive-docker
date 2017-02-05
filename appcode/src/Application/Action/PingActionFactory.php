<?php

namespace Application\Action;

use Interop\Container\ContainerInterface;

class PingActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new PingAction();
    }
}
