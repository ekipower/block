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

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ReferenceBlock;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

use PHPCR\Util\NodeHelper;

class ReferenceBlockEntry extends AbstractBlockEntry
{
	/**
	* 
	* @var ObjectManager
	* 
	*/
	protected $manager;

	public function __construct()
	{
		parent::__construct("Symfony\\Cmf\\Bundle\\BlockBundle\\Doctrine\\Phpcr\\ReferenceBlock");
	}
	
	public function set($slice, $name, $values, array $options = array())
	{
		if ($name === 'referencedBlock')
			return $this->setReferenceBlock($slice, $values, $options);
			
		return parent::set($slice,$name, $values, $options);
	}
	
	private function setReferenceBlock(ReferenceBlock $block, $value, array $options = array())
	{
        $session = $this->getManager($options)->getPhpcrSession();
		$basepath = $value;
        NodeHelper::createPath($this->manager->getPhpcrSession(), $basepath);

        $referenceBlock = $this->manager->find(null, $basepath);
        $block->setReferenceBlock($referenceBlock);
		
		return $this;
	}
}
