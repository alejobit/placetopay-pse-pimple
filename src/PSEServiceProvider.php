<?php

namespace PlacetoPay\PSE;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PSEServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['pse'] = function ($container) {
            $pse = new PSE($container['pse.login'], $container['pse.tranKey']);

            if (isset($container['cache'])) {
                $pse->setCacheAdapter($container['cache']);
            }

            return $pse;
        };

        // always return a new instance of a transaction
        $container['pse.transaction'] = $container->factory(function ($container) {
            return $container['pse']->createTransaction();
        });
    }
}
