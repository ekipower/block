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

use Eki\Block\BlockBundle\Document\ItemBlock;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

class ItemBlockEntry extends AbstractBlockEntry
{
	public function __construct()
	{
		parent::__construct("Eki\\Block\\BlockBundle\\Document\\ItemBlock");
	}
	
	public function set($slice, $name, $values, array $options = array())
	{
		if ($name === 'params')
		{
			return $this->addParams($slice, $values);
		}

		return parent::set($slice,$name, $values, $options);
	}
	
	private function addParams(ItemBlock $block, array $params)
	{
    	foreach($params as $keyParam => $param)
    	{
			$block->setParam($keyParam, $param);
		}
		
		return $this;
	}
}
