<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 6/2/17
 * Time: 2:26 PM
 */

namespace Plugino\Component\HttpKernel;

use \Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Kernel
 *
 * "The Kernel is the heart of the Symfony system" - Fabien Potencier
 * In the same order, here is the heart of Plugino
 *
 * @package Plugino\Component\HttpKernel
 * @author Emmanuel KWENE <njume48@gmail.com>
 */
interface KernelInterface
{

    /**
     * Boots the current kernel.
     * @return void
     */
    public function boot();

    /**
     * Gets the environment.
     *
     * @return string the current environment
     */
    public function getEnvironment();

    /**
     * Checks if debug mode is enabled.
     *
     * @return bool true if debug mode is enabled, false otherwise
     */
    public function isDebug();

    /**
     * Gets the application root dir.
     *
     * @return string the application root dir
     */
    public function getRootDir();

    /**
     * Gets the current container.
     *
     * @return ContainerInterface A ContainerInterface instance
     */
    public function getContainer();

}