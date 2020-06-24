<?php

namespace App;

use App\Core\Container;

/**
 * 初始化全局配置
 */
function bootApp(Container $container)
{
    initConfig($container);
    registerProviders($container);

    return $container;
}

function initConfig(Container $container)
{
    $configs = require __DIR__.'/config/app.php';
    foreach ($configs as $module => $config) {
        foreach ($config as $key => $val) {
            $container->bind($module.'.'.$key, $val);
        }
    }
}

function registerProviders(Container $container)
{
    $providers = $container->resolve('app.providers');
    foreach ($providers as $provider) {
        $providerInstance = new $provider($container);
        $providerInstance->register();
    }
}

// 新增一个 IoC 容器，通过依赖注入获取对象实例
$container = Container::getInstance();

return bootApp($container);
