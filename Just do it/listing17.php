<?php
namespace Application\Listener;

use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Mvc\MvcEvent;

class CompatibilityListener implements ListenerAggregateInterface
{
    public function setupZF1Compatibility(EventInterface $e)
    {
        [...]

        // set request and response for front controller
        \Zend_Controller_Front::getInstance()->setRequest(
            new \Zend_Controller_Request_Http()
        );
        \Zend_Controller_Front::getInstance()->setResponse(
            new \Zend_Controller_Response_Http()
        );
        \Zend_Controller_Front::getInstance()->setDispatcher(
            new \Zend_Controller_Dispatcher_Standard()
        );

        // initialize translations
        $translations = array();

        // get application config
        $applicationConfig = $e->getApplication()->getServiceManager()->get(
            'ApplicationConfig'
        );

        // loop through modules
        foreach ($applicationConfig['modules'] as $module) {
            // build locales filename
            $localesFile = PROJECT_PATH . '/module/' . $module . '/language/'
                . $e->getRouteMatch()->getParam('lang') . '.php';

            // check for file existance
            if (file_exists($localesFile)) {
                // combine translations
                $translations = array_merge(
                    $translations, include $localesFile
                );

                // sort translations
                ksort($translations);
            }
        }

        // initialize Zend_Translate
        $translator = new \Zend_Translate(array(
            'adapter' => 'Array',
            'content' => $localesFile,
            'locale'  => $e->getRouteMatch()->getParam('lang'),
        ));
        $translator->addTranslation(
            $translations, $e->getRouteMatch()->getParam('lang')
        );

        // add Zend_Translate to Zend\Form
        \Zend_Form::setDefaultTranslator($translator);

        // add namespace for static filters
        \Zend_Filter::addDefaultNamespaces('Company_Filter');
        \Zend_Validate::addDefaultNamespaces('Company_Validate');
    }
}

