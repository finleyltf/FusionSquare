<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        /* add translator, set locale, check route url, choose correct translation file */
        $translator = $e->getApplication()->getServiceManager()->get('translator');
        $translator
            ->setLocale(\Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            ->setFallbackLocale('fi_FI');
        $routeCallback = function ($e) {
            $availableLanguages = array ('cn', 'fi', 'en');
            $defaultLanguage = 'fi';
            $language = "";
            $fromRoute = false;
            //see if language could be find in url
            if ($e->getRouteMatch()->getParam('lang')) {
                $language = $e->getRouteMatch()->getParam('lang');

            } else {
                $headers = $e->getApplication()->getRequest()->getHeaders();
                if ($headers->has('Accept-Language')) {
                    $headerLocale = $headers->get('Accept-Language')->getPrioritized();
                    $language = substr($headerLocale[0]->getLanguage(), 0,2);
                }
            }
            if(!in_array($language, $availableLanguages) ) {
                $language = $defaultLanguage;
            }
            $e->getApplication()->getServiceManager()->get('translator')->addTranslationFile("phparray",
                './module/Application/language/lang.array.'.$language.'.php');

        };

        $eventManager->attach(\Zend\Mvc\MvcEvent::EVENT_ROUTE, $routeCallback);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
