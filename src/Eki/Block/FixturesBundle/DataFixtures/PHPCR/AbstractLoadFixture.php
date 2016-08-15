<?php

/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\FixturesBundle\DataFixtures\PHPCR;

use Eki\Block\FixturesBundle\Helper\PHPCR\HelperInterface;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
abstract class AbstractLoadFixture implements LoadFixtureInterface
{
	use LoadFixtureTrait, ContainerAwareTrait;

	public function __construct(array $options = array(), ContainerInterface $container = null)
	{
		$this->setOptions($options);
		$this->container = $container;
	}

	/**
	* Get helper for loading fixtures
	* 
	* @return HelperInterface
	*/
	abstract protected function getHelper();
}
