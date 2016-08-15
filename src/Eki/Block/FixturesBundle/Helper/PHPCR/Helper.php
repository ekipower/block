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

use Eki\Block\SliceBundle\Factory\FactoryInterface;

class Helper implements HelperInterface
{
	/**
	* 
	* @var FactoryInterface
	* 
	*/
	protected $factory;
	
	public function setFactory(FactoryInterface $factory)
	{
		$this->factory = $factory;
		
		return $this;
	}
	
	/**
	* @inheritdoc
	*/
	public function createSlice($alias, $name, $parent, array $values, array $options = array())
	{
		if (!$this->factory->has($alias))
			throw new \RuntimeException('Slice alias '.$alias.' not supported.');
		
		return $this->factory->createSlice(
			$alias, 
			array(
				'name' => $name,
				'parent' => $parent,
				'values' => $values
			),
			$options
		);
	}
	
	/**
	* Create fixture data from config aray
	* 
	* @param string $name
	* @param array $configs
	* @param object $parent
	* 
	* @return void
	*/
    public function createFromConfig($name, array $configs, $parent, array $options = array())
    {
		if (!isset($configs['slice_alias']))
			throw new \LogicException('No slice alias specified with slice '.$name.'.');
		
		$name = isset($configs['name']) ? $configs['name'] : $name;
		$values = isset($configs['values']) ? $configs['values'] : [];

		$slice = $this->createSlice($configs['slice_alias'], $name, $parent, $values, $options);
		
		if (isset($configs['children']))
		{
			foreach($configs['children'] as $childName => $childConfigs)
			{
				$this->createFromConfig($childName, $childConfigs, $slice, $options);
			}
		}
	}
}
