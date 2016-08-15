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

class ZoneBlockEntry extends AbstractBlockEntry
{
	public function __construct()
	{
		parent::__construct("Eki\\Block\\BlockBundle\\Document\\ZoneBlock");
	}
}
