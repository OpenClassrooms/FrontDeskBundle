<?php

namespace OpenClassrooms\Bundle\FrontDeskBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class OpenClassroomsFrontDeskExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/Config/'));
        $loader->load('services.xml');

        $config = $this->processConfiguration(new Configuration(), $config);

        $container->setParameter('openclassrooms.frontdesk.key', $config['key']);
        $container->setParameter('openclassrooms.frontdesk.token', $config['token']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'openclassrooms_frontdesk';
    }
}
