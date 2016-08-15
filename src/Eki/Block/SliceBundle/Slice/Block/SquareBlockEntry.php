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

use Eki\Block\BlockBundle\Document\SquareBlock;
use Eki\Block\BlockBundle\Model\SourceInterface;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

class SquareBlockEntry extends AbstractBlockEntry
{
	public function __construct()
	{
		parent::__construct("Eki\\Block\\BlockBundle\\Document\\SquareBlock");
	}
	
	public function set($slice, $name, $values, array $options = array())
	{
		if ($name === 'appearances')
		{
			return $this->addAppearances($slice, $values);
		}

		if ($name === 'sources')
		{
			return $this->addSources($slice, $values);
		}

		return parent::set($slice,$name, $values, $options);
	}
	
	private function addAppearances(SquareBlock $block, array $appearances)
	{
    	foreach($appearances as $keyAppearance => $appearance)
    	{
			$block->setAppearance($keyAppearance, $appearance);
		}
		
		return $this;
	}
	
	private function addSources(SourceInterface $block, array $sources)
	{
    	foreach($sources as $keySource => $source)
    	{
			$block->setSource($keySource, $source);
		}
		
		return $this;
	}
}
