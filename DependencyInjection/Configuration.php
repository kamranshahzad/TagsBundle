<?php

namespace Kamran\TagsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;


class Configuration implements ConfigurationInterface
{
    
    /**
     *
     * @access public
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kamran_tags');

        $this->addEntitySection($rootNode);
        $this->addFormSection($rootNode);
        


        return $treeBuilder;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \Kamran\TagsBundle\DependencyInjection\Configuration
     */
    private function addFormSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('form')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->append($this->addFormHandlerSection())
                        ->append($this->addFormTypeSection())
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @return \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition
     */
    private function addFormHandlerSection()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('handler');
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()

                ->arrayNode('tag_create')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('class')->defaultValue('Kamran\TagsBundle\Form\Handler\TagsFormHandler')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $node;
    }

    /**
     *
     * @access private
     * @return \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition
     */
    private function addFormTypeSection()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('type');

        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()

                ->arrayNode('tag_create')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('class')->defaultValue('Kamran\TagsBundle\Form\Type\TagsFormType')->end()
                    ->end()
                ->end()

            ->end()
        ;

        return $node;
    }


    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \Kamran\tagsBundle\DependencyInjection\Configuration
     */
    private function addEntitySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('entity')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()

                        ->arrayNode('tags')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('Kamran\TagsBundle\Entity\Tags')->end()
                            ->end()
                        ->end()

                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }




}
