<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\BlockBundle\Model;

interface SourceInterface
{
	public function getSources();
	public function setSources(array $sources = array());
	public function setSource($name, $value);
	public function getSource($name, $default = null);
}
