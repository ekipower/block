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

use Doctrine\Common\Persistence\ObjectManager;
use PHPCR\Util\NodeHelper;

use Symfony\Component\Yaml\Parser;

/**
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
trait LoadFixtureTrait
{
	/**
	* 
	* @var array
	* 
	*/
	protected $options = array();

	/**
	* @inheritdoc
	* 
	* @return
	*/
    public function loadByAlias(ObjectManager $manager, $parent, $aliasConfig, $aliasFile = null)
    {
    	if (null === $aliasFile)
    		$aliasFile = $aliasConfig;
		$configs = $this->getConfigs($aliasFile, $aliasConfig);

		if (null === $parent)
		{
	        $session = $manager->getPhpcrSession();

			$basepath = $this->getBasePath();
	        NodeHelper::createPath($manager->getPhpcrSession(), $basepath);

	        $parent = $manager->find(null, $basepath);
		}

		$helper = $this->getHelper();
	    $helper->createFromConfig($aliasConfig, $configs, $parent, 
	    	array(
	    		'object_manager' => $manager,
	    		'image_dir' => $this->imageDir(),
	    		'container' => $this->container,
	    	)
	    );

        $manager->flush();
    }
    
    public function setOptions(array $options)
    {
    	if ( !empty($options) )
    	{
    		if ( !isset($options['base_path']) ) 
    			throw new \LogicException("options must have index base_path");
    		if ( !isset($options['fixtures_dir']) ) 
    			throw new \LogicException("options must have index fixtures_dir");
    		if ( !isset($options['filter_configs_func']) )
    			throw new \LogicException("options must have indexfilter_configs_func");
		}
    	
    	foreach($options as $key => $option)
    	{
			$this->options[$key] = $option;
		}
		
		return $this;
	}

    protected function getBasePath()
    {
        return $this->options['base_path'];
	}
    
    protected function getConfigs($aliasFile, $aliasConfig)
    {
		$configFile = $this->configDir() . "//" . $aliasFile . ".yml";
		$yaml = new Parser();
		$configs = $yaml->parse( file_get_contents( $configFile ) );

		return $this->filterConfigs($configs, $aliasConfig);
	}
    
    protected function fixturesDir()
    {
		return $this->options['fixtures_dir'];
	}

	protected function getDir($type)
	{
		if ($type === 'config')
			return $this->fixturesDir();
		if ($type === 'image')
			return $this->fixturesDir() . "//images";
	}
    
	protected function configDir()
	{
		return $this->getDir('config');
	}
	
	protected function imageDir()
	{
		return $this->getDir('image');
	}

    protected function filterConfigs(array $configs, $alias)
    {
    	return call_user_func($this->options['filter_configs_func'], $configs, $alias);
	}
}
