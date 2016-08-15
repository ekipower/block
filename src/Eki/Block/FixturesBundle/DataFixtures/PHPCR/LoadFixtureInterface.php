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

use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
interface LoadFixtureInterface
{
    public function loadByAlias(ObjectManager $manager, $parent, $aliasConfig, $aliasFile = null);
}
