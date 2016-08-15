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

use Eki\Block\FixturesBundle\Tests\Helper\PHPCR\BaseTest;

use Eki\Block\FixturesBundle\Helper\PHPCR\Helper;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Yaml\Parser;

use Doctrine\Common\Persistence\ObjectManager;
use PHPCR\Util\NodeHelper;

/**
 * Helper tests.
 *
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class HelperTest extends BaseTest
{
	private $helper;
	
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
    	$this->__setup();
    	
    	$this->helper = $this->newHelper();
    }
	
	/**
	* @test
	*/
	public function __constructTest()
	{
    	$this->assertNotNull($this->newHelper());
	}

	/**
	* @test
	*/
	public function imagineCreationTest()
	{
		$yaml = new Parser();
		$configs = $yaml->parse( file_get_contents( $this->fixturesDir . "//image_testing.yml" ) );
		$configs = $configs['sites']['test']['blocks']['image_testing'];
		
		$manager = $this->getManager();
		$basepath = $this->client->getContainer()->getParameter('cmf_block.persistence.phpcr.block_basepath');
        NodeHelper::createPath($manager->getPhpcrSession(), $basepath);
        $parent = $manager->find(null, $basepath);
		
		$this->helper->createFromConfig('image_testing', $configs, $parent, $this->options);
	}

	/**
	* @test
	*/
	public function menuCreationTest()
	{
		$yaml = new Parser();
		$configs = $yaml->parse( file_get_contents( $this->fixturesDir . "//menu_testing.yml" ) );
		$configs = $configs['sites']['test']['menus']['menu_testing'];
		
		$manager = $this->getManager();
		$basepath = $this->client->getContainer()->getParameter('cmf_menu.persistence.phpcr.menu_basepath');
        NodeHelper::createPath($manager->getPhpcrSession(), $basepath);
        $parent = $manager->find(null, $basepath);
		
		$this->helper->createFromConfig('menu_testing', $configs, $parent, $this->options);
	}

	/**
	* @test
	*/
	public function useMenuBlockTest()
	{
		$yaml = new Parser();
		$configs = $yaml->parse( file_get_contents( $this->fixturesDir . "//menu_block.yml" ) );
		$configs = $configs['sites']['test']['blocks']['menu_block'];
		
		$manager = $this->getManager();
		$basepath = $this->client->getContainer()->getParameter('cmf_block.persistence.phpcr.block_basepath');
        NodeHelper::createPath($manager->getPhpcrSession(), $basepath);
        $parent = $manager->find(null, $basepath);
		
		$this->helper->createFromConfig('menu_block', $configs, $parent, $this->options);
	}
		
	private function newHelper()
	{
		$helper = new Helper();
		$helper->setFactory($this->newFactory());
		
    	return $helper;
	}
}
