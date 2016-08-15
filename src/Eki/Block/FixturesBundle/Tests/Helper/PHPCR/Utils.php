<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\FixturesBundle\Tests\Helper\PHPCR;

use Eki\Block\SliceBundle\Factory\Factory;

use Eki\Block\SliceBundle\Slice\Block\PadBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\ZoneBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\SquareBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\ItemBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\FormBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\StringBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\SimpleBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\MenuBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\SlideshowBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\ImagineBlockEntry;
use Eki\Block\SliceBundle\Slice\Block\ReferenceBlockEntry;

use Eki\Block\SliceBundle\Slice\Menu\MenuEntry;
use Eki\Block\SliceBundle\Slice\Menu\MenuNodeEntry;
use Eki\Block\SliceBundle\Slice\Menu\MenuNodeBaseEntry;

/**
 * Utils for tests.
 *
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
final class Utils
{
	static public function newDefaultFactory()
	{
		$factory = new Factory();
			$factory->register('eki.block.pad', new PadBlockEntry());
			$factory->register('eki.block.zone', new ZoneBlockEntry());
			$factory->register('eki.block.square', new SquareBlockEntry());
			$factory->register('eki.block.item', new ItemBlockEntry());
			$factory->register('eki.block.action.form', new FormBlockEntry());
			
			// cmf.block.
			$factory->register('cmf.block.string', new StringBlockEntry());
			$factory->register('cmf.block.simple', new SimpleBlockEntry());
			$factory->register('cmf.block.menu', new MenuBlockEntry());
			$factory->register('cmf.block.slideshow', new SlideshowBlockEntry());
			$factory->register('cmf.block.imagine', new ImagineBlockEntry());
			$factory->register('cmf.block.reference', new ReferenceBlockEntry());

			// cmf.menu
			$factory->register('cmf.menu.menu', new MenuEntry());
			$factory->register('cmf.menu.node', new MenuNodeEntry());
			$factory->register('cmf.menu.node_base', new MenuNodeBaseEntry());
			
		return $factory;			
	}
}
