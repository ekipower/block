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

use Doctrine\Common\Persistence\ObjectManager;

class AbstractSliceEntry implements SliceEntryInterface
{
	/**
	* 
	* @var string
	* 
	*/
	protected $class;
	
	protected function __construct($class)
	{
		if (!class_exists($class))
		{
			throw new \Exception('No class found: '.$class.'.');
		}
		
		$this->class = $class;
	}

	/**
	* @inheritdoc
	*/
	public function getClass()
	{
		return $this->class;
	}
	
	/**
	* @inheritdoc
	*/
	public function createNew()
	{
		return new $this->class(); 
	}
	
	/**
	* @inheritdoc
	*/
	public function setBasic($slice, array $values = array())
	{
		if ( !isset($values['name']) || !isset($values['parent']) )
		{
			throw new \LogicException('values must have name and parent index.');
		}

		$name = $values['name'];
		$parent = $values['parent'];
		
    	$slice->setName($name);
    	if (null !== $parent)
    	{
    		$parent->addChild($slice, $name);
	    	$slice->setParentDocument($parent);
		}
		
		return $this;
	}
	
	/**
	* @inheritdoc
	*/
	public function set($slice, $name, $values, array $options = array())
	{
		$method = 'set'.ucfirst($name);
		
		if (!method_exists($slice, $method))
			throw new \LogicException('No method .'.$method.' for slice '.$slice->getName().' with class '.get_class($slice));
		
		$slice->$method($values);
		
		return $this;
	}

	/**
	* @inheritdoc
	*/
	public function setAll($slice, array $values, array $options = array())
	{
		$valuesTranslation = array();
		foreach($values as $keyValue => $value)
		{
			if (is_array($value) && isset($value['multilang']))  // translation
			{
				if (!is_array($value['multilang']))
					throw new \LogicException('Multilang element must be an array of locales.');
					
				foreach($value['multilang'] as $locale)
				{
					if (!isset($valuesTranslation[$locale]))
						$valuesTranslation[$locale] = array();
						
					$valuesTranslation[$locale][$keyValue] = $value[$locale];
				}
			}
			else
			{
				$this->set($slice, $keyValue, $value, $options);
			}
		}

		$slicePersisted = false;
		foreach($valuesTranslation as $locale => $entries)
		{
			if (!$slicePersisted)
			{
				$this->persist($slice, $this->getManager($options));
				$slicePersisted = true;
			}
			
			foreach($entries as $key => $val)
			{
				$this->set($slice, $key, $val, $options);
			}
			$this->bindTranslation($slice, $locale, $this->getManager($options));
		}

		if (!$slicePersisted)
		{
			$this->persist($slice, $this->getManager($options));
			$slicePersisted = true;	
		}
		
		return $slice;
	}
	
	protected function getManager(array $options)
	{
		return $options['object_manager'];
	}
	
	private function persist($slice, ObjectManager $manager)
	{
		$manager->persist($slice);
	}

	private function bindTranslation($slice, $locale, ObjectManager $manager)
	{
		$manager->bindTranslation($slice, $locale);
	}
}
