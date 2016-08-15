<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\SliceBundle\Slice\Block;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\MenuBlock;

class MenuBlockEntry extends AbstractBlockEntry
{
	public function __construct()
	{
		parent::__construct("Symfony\\Cmf\\Bundle\\BlockBundle\\Doctrine\\Phpcr\\MenuBlock");
	}
	
	public function set($slice, $name, $values, array $options = array())
	{
		if ($name === 'menuNode')
			return $this->setMenuNode($slice, $values, $options);
			
		return parent::set($slice,$name, $values, $options);
	}
	
	private function setMenuNode(MenuBlock $block, $value, array $options = array())
	{
        $menuNode = $this->getManager($options)->find(null, $value);
        
        $block->setMenuNode($menuNode);
		
		return $this;
	}
	
}
