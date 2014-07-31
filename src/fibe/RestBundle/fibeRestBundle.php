<?php

namespace fibe\RestBundle;

use fibe\RestBundle\DependencyInjection\Security\Factory\WsseFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;


class fibeRestBundle extends Bundle
{
	public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new WsseFactory());
    }
}
