<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView()
    {
        $theme = 'default';
        $options = $this->getOptions(); // retrieve config
        if ( isset($options['app']['theme']) )
        {
            $theme = $options['app']['theme'];
        }
        $themePath = PUBLIC_PATH . '/themes/' . $theme . '/templates';

        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        /* @var $layout Zend_Layout */
        $layout->setLayoutPath($themePath);
        
        $view = new Zend_View();
        $view->setBasePath($themePath);
        $view->setScriptPath($themePath);

        $layout->setView($view);
        
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);
        
        return $view;
    }
}

