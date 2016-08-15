<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\SliceBundle\Factory;

use Eki\Block\SliceBundle\Slice\SliceEntryInterface;

interface FactoryInterface
{
	/**
	* Register a slice entry
	* 
	* @param string $alias
	* @param SlicekEntryInterface $sliceEntry
	* 
	* @return void
	* @throw
	*/
	public function register($alias, SliceEntryInterface $sliceEntry);

	/**
	* Create a block with block alias given
	* 
	* @param string $alias
	* @param array $values
	* @param array $options
	* 
	* @return object
	*/
	public function createSlice($alias, array $values = array(), array $options = array());
}
