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

use Eki\Block\FixturesBundle\Helper\PHPCR\Factory;

use Eki\Block\FixturesBundle\Helper\PHPCR\Block\PadBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\ZoneBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\SquareBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\ItemBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\FormBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\StringBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\SimpleBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\MenuBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\SlideshowBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\ImagineBlockEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Block\ReferenceBlockEntry;

use Eki\Block\FixturesBundle\Helper\PHPCR\Menu\MenuEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Menu\MenuNodeEntry;
use Eki\Block\FixturesBundle\Helper\PHPCR\Menu\MenuNodeBaseEntry;

class DefaultFactory extends Factory
{
	public function __construct()
	{
		// eki.block.
		$this->register('eki.block.pad', new PadBlockEntry());
		$this->register('eki.block.zone', new ZoneBlockEntry());
		$this->register('eki.block.square', new SquareBlockEntry());
		$this->register('eki.block.item', new ItemBlockEntry());
		$this->register('eki.block.action.form', new FormBlockEntry());
		
		// cmf.block.
		$this->register('cmf.block.string', new StringBlockEntry());
		$this->register('cmf.block.simple', new SimpleBlockEntry());
		$this->register('cmf.block.menu', new MenuBlockEntry());
		$this->register('cmf.block.slideshow', new SlideshowBlockEntry());
		$this->register('cmf.block.imagine', new ImagineBlockEntry());
		$this->register('cmf.block.reference', new ReferenceBlockEntry());

		// cmf.menu
		$this->register('cmf.menu.menu', new MenuEntry());
		$this->register('cmf.menu.node', new MenuNodeEntry());
		$this->register('cmf.menu.node_base', new MenuNodeBaseEntry());
	}
}
