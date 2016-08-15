<?php

/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\FixturesBundle\Helper\PHPCR;

interface HelperInterface
{
	/**
	* Create a slice (block, menh)
	* 
	* @param string $alias Ex.: eki.block.pad, cmf.block.simple
	* @param string $name
	* @param object $parent
	* @param array $values
	* @param array $options
	* 
	* @return object Created slice object
	*/
	public function createSlice($alias, $name, $parent, array $values, array $options = array());
	
	/**
	* Create fixture data from config array
	* 
	* @param string $name
	* @param array $configs
	* @param object $parent
	* @param array $options
	* 
	* @return void
	*/
    public function createFromConfig($name, array $configs, $parent, array $options = array());
}
