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

use Eki\Block\FixturesBundle\Helper\PHPCR\Helper;
use Eki\Block\FixturesBundle\Helper\PHPCR\Factory;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class LoadFixture extends AbstractLoadFixture
{
	protected function getHelper()
	{
		$factory = $this->container->get('eki_block.slice.factory');
		
		$helper = new Helper();
		$helper->setFactory($factory);
		
		return $helper;
	}
}
