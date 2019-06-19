<?php

namespace Tenolo\Bundle\TranslationAdminBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * Class TenoloTranslationAdminExtension
 *
 * @package Tenolo\Bundle\TranslationAdminBundle\DependencyInjection
 * @author  Nikita Loges
 */
class TenoloTranslationAdminExtension extends ConfigurableExtension
{

    /**
     * @inheritdoc
     */
    public function loadInternal(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('admin.yml');
    }
}
