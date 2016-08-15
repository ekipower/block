<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\SliceBundle\Slice;

interface SliceEntryInterface
{
	/**
	* Get class of slice
	* 
	* @return
	*/
	public function getClass();
	
	/**
	* Create a new slice
	* 
	* @return object
	*/
	public function createNew();
	
	/**
	* Set basic for slice
	* 
	* @param object $slice
	* @param array $values
	* 
	* @return object
	*/
	public function setBasic($slice, array $values = array());
	
	/**
	* Set property for slice
	* 
	* @param some $slice
	* @param string $name
	* @param mixed $values
	* @pẩm aray $options
	* 
	* @return object
	*/
	public function set($slice, $name, $values, array $options = array());
	
	/**
	* Set all props but basic
	* 
	* @param object $slice
	* @param array $values
	* 
	* @return object
	*/
	public function setAll($slice, array $values, array $options = array());
}
