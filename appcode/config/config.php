<?php
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Glob;
use Zend\Expressive\ConfigManager\ConfigManager;
use Zend\Expressive\ConfigManager\PhpFileProvider;

$configManager = new ConfigManager(
    [
        Application\ModuleConfig::class,
        Domain\ModuleConfig::class,
        Infrastructure\ModuleConfig::class,

        new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
    ]
);

return new ArrayObject($configManager->getMergedConfig());
