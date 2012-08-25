<?php

namespace SocialogAnalytics;

use Zend\Config\Factory as ConfigFactory;

/**
 * Socialog Analytics
 */
class Module
{
    public function onBootstrap($e)
    {
        $app = $e->getApplication();
        $sm = $app->getServiceManager();
        $sharedEventManager = $sm->get('SharedEventManager');

        // Ugly, change to inlineScript container
        $sharedEventManager->attach('theme', 'page.bottom', function(){
                return <<<SCRIPT
<script type="text/javascript">
var _gaq = _gaq || [];\n
_gaq.push(['_trackPageview']);\n
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();\n
</script>
SCRIPT;
        });
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
	
	/**
	 * Service Configuration
	 * 
	 * @return array
	 */
	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'socialog_analytics_config' => function($sm) {
					return ConfigFactory::fromFile('config/autoload/socialog-analytics.ini', true);
				},
			),
		);
	}
}
