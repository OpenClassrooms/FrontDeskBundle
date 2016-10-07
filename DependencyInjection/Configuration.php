<?php

namespace OpenClassrooms\Bundle\FrontDeskBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('openclassrooms_frontdesk');
        $rootNode->children()
            ->scalarNode('key')->isRequired()->end()
            ->scalarNode('token')->isRequired()->end()
            ->end();

        return $treeBuilder;
    }
}
