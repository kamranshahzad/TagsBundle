<?php

namespace Kamran\TagsBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;


class KamranTagsExtension extends Extension
{

    public function getAlias()
    {
        return 'kamran_tags';
    }

    public function load(array $configs, ContainerBuilder $container)
    {
    	$processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);
        $this->getFormSection($config, $container);
        $this->getEntitySection($config, $container);


        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services\forms.yml');
    }

    /**
     *
     * @access private
     * @param  array                                                              $config
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder            $container
     * @return \CCDNForum\ForumBundle\DependencyInjection\CCDNForumForumExtension
     */
    private function getFormSection(array $config, ContainerBuilder $container)
    {
        //Form Types
        $container->setParameter('kamran_tags.form.type.tag_create.class', $config['form']['type']['tag_create']['class']);

        //Form Handlers
        $container->setParameter('kamran_tags.form.handler.tag_create.class', $config['form']['handler']['tag_create']['class']);


        return $this;
    }

        /**
     *
     * @access private
     * @param  array                                                              $config
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder            $container
     * @return \CCDNForum\ForumBundle\DependencyInjection\CCDNForumForumExtension
     */
    private function getEntitySection(array $config, ContainerBuilder $container)
    {

        $container->setParameter('kamran_tags.entity.tags.class', $config['entity']['tags']['class']);

        return $this;
    }


}
