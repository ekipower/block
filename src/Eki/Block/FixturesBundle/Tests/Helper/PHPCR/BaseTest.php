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

use Eki\Block\FixturesBundle\Helper\PHPCR\Helper;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
//use Symfony\Component\Yaml\Parser;

use Doctrine\Common\Persistence\ObjectManager;
//use PHPCR\Util\NodeHelper;

/**
 * Default factory tests.
 *
 * @author Nguyen Tien Hy <ngtienhy@gmail.com>
 */
class BaseTest extends WebTestCase
{
	protected $fixturesDir = __DIR__ . "//..//..//Resources//fixtures";

	protected $managerName;
	
	protected $options;
	
	/**
	* @test
	*/
	public function dummyTest()
	{
	}

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
    	$this->__setup();
    }
	
    protected function __setUp()
    {
    	$this->client = $this->createClient();
    	$this->managerName = 'eki_block_test';

		$this->options =     	
			array(
				'object_manager' => $this->client->getContainer()->get('doctrine_phpcr')->getManager($this->managerName),
				'image_dir' => $this->fixturesDir . "//images"
			)
    	;
    }
	
	protected function getManager()
	{
		return $this->client->getContainer()->get('doctrine_phpcr')->getManager($this->managerName);
	}
	
	/**
	* @test
	*/
	public function checkOptions()
	{
		$this->assertTrue(isset($this->options['object_manager']));
		$this->assertNotNull($this->options['object_manager']);
		$this->assertInstanceOf("Doctrine\\Common\\Persistence\\ObjectManager", $this->options['object_manager']);

		$this->assertTrue(isset($this->options['image_dir']));
		$this->assertTrue(file_exists($this->options['image_dir']));
	}

	protected function newFactory()
	{
		return Utils::newDefaultFactory();
	}
}
