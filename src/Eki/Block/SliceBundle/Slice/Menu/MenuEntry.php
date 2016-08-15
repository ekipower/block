<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\SliceBundle\Slice\Menu;

class MenuEntry extends AbstractMenuEntry
{
	public function __construct()
	{
		parent::__construct("Symfony\\Cmf\\Bundle\\MenuBundle\\Doctrine\\Phpcr\\Menu");
	}
}
