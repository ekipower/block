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

class Factory implements FactoryInterface
{
	/**
	* 
	* @var 
	* 
	*/
	protected $registeredSlices = array();

	/**
	* @inheritdoc
	*/	
	public function register($alias, SliceEntryInterface $sliceEntry)
	{
		if ($this->has($alias))
		{
			throw new \LogicException('Already a slice entry registered with alias '.$alias);
		}
		
		$this->registeredSlices[$alias] = $sliceEntry;
		
		return $this;
	}
	
	/**
	* Checks if slice entry exists...
	* 
	* @param string $alias
	* 
	* @return bool
	*/
	public function has($alias)
	{
		return isset($this->registeredSlices[$alias]);
	}
	
	/**
	* Gets slice entry with alias
	* 
	* @param string $alias
	* 
	* @return SliceEntryInterface
	*/
	public function get($alias)
	{
		return $this->registeredSlices[$alias];
	}
	
	/**
	* @inheritdoc
	*/
	public function createSlice($alias, array $values = array(), array $options = array())
	{
		if ( !isset($values['name']) || !isset($values['parent']) || !isset($values['values']) )
		{
			throw new \LogicException('values must have name, parent, and values index.');
		}

		$sliceEntry = $this->get($alias);
		$slice = $sliceEntry->createNew();
		
		$sliceEntry->setBasic($slice, $values);
		
		return $sliceEntry->setAll($slice, $values['values'], $options);
	}
}
