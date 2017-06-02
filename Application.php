<?php
/*
 * This file is part of the Symfony package.
 *
 * (c) Emmanuel KWENE <njume48@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Plugino\Framework;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Application
{
    public $plugin;
    protected $pluginDirectory;


	public function __construct($directory)
	{
	    $this->pluginDirectory = $directory;
	    $this->plugin = new ContainerBuilder;
	    //$loader = new YamlFileLoader($this->plugin, new FileLocator(ROOT_DIR . 'app/config'));
	}

}