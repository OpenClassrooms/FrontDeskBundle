<?php

namespace OpenClassrooms\Bundle\FrontDeskBundle\Tests\DependencyInjection;

use OpenClassrooms\Bundle\FrontDeskBundle\OpenClassroomsFrontDeskBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class OpenClassroomsFrontDeskExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var YamlFileLoader
     */
    protected $configLoader;

    /**
     * @var ContainerBuilder
     */
    protected $container;

    /**
     * @var XmlFileLoader
     */
    protected $serviceLoader;

    /**
     * @test
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function NoConfiguration_ThrowException()
    {
        $this->configLoader->load('empty_config.yml');
        $this->container->compile();
    }

    /**
     * @test
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function WithoutTokenConfiguration_ThrowException()
    {
        $this->configLoader->load('without_token_config.yml');
        $this->container->compile();
    }

    /**
     * @test
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function WithoutApiKeyConfiguration_ThrowException()
    {
        $this->configLoader->load('without_api_key_config.yml');
        $this->container->compile();
    }

    /**
     * @test
     */
    public function PersonServiceReturnPerson()
    {
        $this->configLoader->load('config.yml');
        $this->container->compile();
        $personService = $this->container->get('openclassrooms.frontdesk.service.person');
        $this->assertInstanceOf('OpenClassrooms\FrontDesk\Services\Impl\PersonServiceImpl', $personService);
    }

    /**
     * @test
     */
    public function PackServiceReturnPack()
    {
        $this->configLoader->load('config.yml');
        $this->container->compile();
        $packService = $this->container->get('openclassrooms.frontdesk.service.pack');
        $this->assertInstanceOf('OpenClassrooms\FrontDesk\Services\Impl\PackServiceImpl', $packService);
    }

    protected function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->container->set('request_stack', new RequestStack());
        $bundle = new OpenClassroomsFrontDeskBundle();

        $this->container->registerExtension($bundle->getContainerExtension());
        $this->container->loadFromExtension('openclassrooms_frontdesk');

        $this->configLoader = new YamlFileLoader(
            $this->container,
            new FileLocator(__DIR__.'/Fixtures/Resources/config')
        );

        $this->serviceLoader = new XmlFileLoader(
            $this->container,
            new FileLocator(__DIR__.'/../../Resources/config')
        );

        $this->serviceLoader->load('services.xml');
        $bundle->build($this->container);
    }
}
