<?php

namespace Ddeboer\Salesforce\MapperBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class DdeboerSalesforceMapperExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if (isset($config['cache_driver'])) {
            switch ($config['cache_driver']) {
                case 'file':
                    $container->setAlias('ddeboer_salesforce_mapper.cache', 'ddeboer_salesforce_mapper.file_cache');
                    break;
                default:
                    break;
            }
        }

        if (isset($config['param_converter'])) {
            $loader->load('param_converter.xml');
            $container->setParameter('ddeboer_salesforce_mapper.param_converter', $config['param_converter']);
        }
    }
}

