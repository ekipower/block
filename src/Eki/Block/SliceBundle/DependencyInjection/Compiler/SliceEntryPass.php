<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\SliceBundle\DependencyInjection\Compiler;

use InvalidArgumentException;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use \ReflectionClass;

class SliceEntryPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('eki_block.slice.factory')) {
            return;
        }

		$factoryDefinition = $container->getDefinition('eki_block.slice.factory');

        foreach ($container->findTaggedServiceIds('eki_block.slice_entry') as $serviceId => $tags) 
        {
            foreach ($tags as $tag) 
            {
                if (!isset($tag['alias'])) {
                    throw new InvalidArgumentException(
                        "The service tag 'eki_block.slice_entry' requires an 'alias' attribute"
                    );
                }

                $factoryDefinition->addMethodCall(
                	'register',
                	[$tag['alias'], new Reference($serviceId)]
                );
            }
        }
    }
}
