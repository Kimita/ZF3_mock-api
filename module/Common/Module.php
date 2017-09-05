<?php
namespace Common;

use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap($e)
    {
        $app = $e->getTarget();
        $services = $app->getServiceManager();
        $errorListener = $services->get(Listeners\ApiErrorListener::class);
        $app->getEventManager()->attach(
                MvcEvent::EVENT_RENDER,
                [$errorListener, 'onRender'],
                1000
            );
    }

    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }
}