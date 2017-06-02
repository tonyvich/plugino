<?php

namespace Plugino\Component\HttpKernel;
use Symfony\Component\Config\FileLocator;
use \Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


/**
 * Class Kernel
 *
 * "The Kernel is the heart of the Symfony system" - Fabien Potencier
 * In the same order, here is the heart of Plugino
 *
 * @package Plugino\Component\HttpKernel
 * @author Emmanuel KWENE <njume48@gmail.com>
 */
abstract class Kernel implements KernelInterface
{
    protected $container;
    protected $rootDir;
    protected $environment;
    protected $booted = false;
    protected $debug;

    const VERSION = '0.1.0';



    public function __construct($environment, $debug)
    {
        $this->rootDir = $this->getRootDir();
        $this->environment = $environment;
        $this->debug = (bool) $debug;
    }

    public function __clone()
    {
        $this->booted = false;
        $this->container = null;
    }

    /**
     * Boots the current kernel.
     */
    public function boot()
    {
        // init the container
        $this->initializeContainer();

        $this->booted = true;
    }

    /**
     * {@inheritdoc}
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * {@inheritdoc}
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * {@inheritdoc}
     */
    public function getRootDir()
    {
        if (null === $this->rootDir) {
            $r = new \ReflectionObject($this);
            $this->rootDir = dirname($r->getFileName());
        }

        return $this->rootDir;
    }

    /**
     * {@inheritdoc}
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Initializes the service container.
     *
     * The cached version of the service container is used when fresh, otherwise the
     * container is built.
     */
    public function initializeContainer()
    {
        $this->container = new ContainerBuilder;
        $loader = new YamlFileLoader($this->container, new FileLocator($this->getRootDir() . 'app/config/'));
        $loader->load('services.yml');

        $this->container->setParameter('root_dir', $this->getRootDir());
        $this->container->setParameter('env', $this->getEnvironment());
        $this->container->compile();
    }
}