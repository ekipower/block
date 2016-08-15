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

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ImagineBlock;
use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

class ImagineBlockEntry extends AbstractBlockEntry
{
	public function __construct()
	{
		parent::__construct("Symfony\\Cmf\\Bundle\\BlockBundle\\Doctrine\\Phpcr\\ImagineBlock");
	}
	
	public function set($slice, $name, $values, array $options = array())
	{
		if ($name === 'image')
		{
			if (!isset($options['image_dir']))
				throw new \LogicException('No image directory specified in options with index image_dir.');
				
			return $this->setImage($slice, $values, $options['image_dir']);
		}
			
		return parent::set($slice, $name, $values, $options);
	}
	
	private function setImage(ImagineBlock $block, $value, $imageDir)
	{
		if (!is_array($value))
		{
			throw new \LogicException('$value must be array.');
		}
		
		if (isset($value['fileContentFromFilesystem']))
		{
			$imageFile = $imageDir . "//" . $value['fileContentFromFilesystem'];
			if (!file_exists($imageFile))
			{
				throw new \LogicException('No file '.$imageFile.' found.');
			}

			$image = new Image();
			$image->setFileContentFromFilesystem($imageFile);
			$block->setImage($image);
		}
		
		return $this;
	}
}
