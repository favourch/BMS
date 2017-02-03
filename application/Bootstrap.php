<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    /**
     * Initialize the application autoload
     *
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAppAutoload() {
        //Set up the session for application
        Zend_Session::start();

        date_default_timezone_set('Asia/Colombo');

        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Base',
            'basePath' => dirname(__FILE__),
        ));
        
        $staffUserInfo = new Zend_Session_Namespace('staffUserInfo');
        Zend_Registry::set('staffUserInfo', $staffUserInfo);

        // get the configuration form config.ini
        $config = Zend_Registry::get('config');

        $frontendOpts = array(
            'caching' => $config->cachemanager->memcached->frontend->caching,
            'lifetime' => $config->cachemanager->memcached->frontend->lifetime,
            'automatic_serialization' => $config->cachemanager->memcached->frontend->automatic_serialization
        );

        $backendOpts = array(
            'servers' => array(
                array(
                    'host' => $config->cachemanager->memcached->backend->host,
                    'port' => $config->cachemanager->memcached->backend->port
                )
            ),
            'compression' => $config->cachemanager->memcached->backend->compression
        );

        //$cache = Zend_Cache::factory('Core', 'Memcached', $frontendOpts, $backendOpts);
        //Zend_Registry::set('Memcache', $cache);

        return $autoloader;
    }

    /**
     * Initialize the layout loader
     */
    protected function _initLayoutHelper() {
        $this->bootstrap('frontController');
        $layout = Zend_Controller_Action_HelperBroker::addHelper(
                        new My_Controller_Action_Helper_LayoutLoader());
    }

    protected function _initTranslator() {
        if (php_sapi_name() != 'cli') {
            $appLang = new Zend_Session_Namespace('appLang');
            $userLanguage = "";
            if (isset($_GET["lang"])) {
                $userLanguage = $_GET["lang"];
                $appLang->lang = $userLanguage;
            } else {
                if (!$appLang->lang) {
                    $config = Zend_Registry::get('config');
                    $userLanguage = $config->system->default->lang;
                    $appLang->lang = $userLanguage;
                }
            }

            // set up translation adapter    
            $tr = new Zend_Translate('csv', 'locale', null, array('scan' => Zend_Translate::LOCALE_DIRECTORY));
            $tr->addTranslation('locale/fr_FR.csv', 'fr_FR'); // French


            $tr->setLocale($appLang->lang);
            Zend_Registry::set('Zend_Translate', $tr);
            return $tr;
        }
    }

    protected function _initDoctype() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
        return $view;
    }

    /*
      protected function _initLog() {
      $config = new Zend_Config_Ini('../application/configs/application.ini', APPLICATION_ENV);

      $log = Zend_Log::factory($config->log);
      $registry = Zend_Registry::getInstance();
      $log->registerErrorHandler();

      $registry->log = $log;
      return $log;
      }
     * 
     */
}
