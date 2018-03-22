	<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('booster', dirname(__FILE__).'/../extensions/booster');


require_once(dirname(__FILE__).'/../includes/localization.php');
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Efecty',

	// preloading 'log' component

	'preload'=>array('log', 'bootstrap'),


	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.ECompositeUniqueValidator',
                'ext.yii-mail.YiiMailMessage',
        'ext.YiiConditionalValidator',
        'ext.Date',
        'ext.Number',
        'ext.Flashes',
        'ext.ValidatorRIF',
        'ext.pdffactory. *',
//        'ext.highcharts.*',    
              //'Application.pdf.docs.*', // la ruta donde se colocan las clases EPdfFactoryDoc
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array('booster.gii'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'class' => 'WebUser'
		),
            
//                'ldap'=>array(
//                    'class'=>'application.extensions.adLDAP.YiiLDAP',
//                     // those are standard adLDAP options check http://adldap.sourceforge.net/ for documentation
//                     'options'=> array(
//                                    'ad_port'      => 389,
//                                    'domain_controllers'    => array('10.1.0.112'),
//                                    'account_suffix' =>  '@ipostel.ve',
//                                    'base_dn' => NULL,
//                            // for basic functionality this could be a standard, non privileged domain user (required)
//                                    'admin_username' => 'jdoe',
//                                    'admin_password' => 'password',
//                    ),
//                ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
                'urlManager'=>array(
                                    'urlFormat'=>'path',
                                    'showScriptName'=>false,
                                    'caseSensitive'=>true,
                                    'rules'=>array(
                                        //'socio/informeConsultor' => 'socio/informeConsultor',

                                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                    ),
                ),
                'mail' => array(
                    'class' => 'ext.yii-mail.YiiMail',
                    'transportType' => 'smtp',
                    'transportOptions' => array(
                        'host' => 'mail.efectylogistic.com',
                        'encryption' => 'ssl',
                        'username' => 'logistico@efectylogistic.com',
                        'password' => 'Mayo2015',
                        'port' => 465,
                    ),
                    'viewPath' => 'application.views.mails',
                ),

                /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a POSTGRES database
//		'db'=>array(
//			'connectionString' => 'pgsql:host=localhost;dbname=av',
//			'emulatePrepare' => true,
//			'username' => 'av',
//			'password' => 'Av123456',
//			'charset' => 'utf8',
//		),
                'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=logistico',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '7armando93',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				/**/
			),
		),
                'bootstrap' => array(
                        'class' => 'Booster'
                ),

        /* ING. MANUEL FERNANDEZ ++++++++++++++++++++++
        ++ Agregando gettext para utilizar en Traducciones
        ++++++++++++++++++++++++++++++++++++++++++++++*/
        'messages' => array(
            'class' => 'CGettextMessageSource',
            "useMoFile" => FALSE,
        ),
         /* ++++++++++++++++++++++++++++++++++++++++++*/

             'pdfFactory'=>array (
             'class'=>'ext.pdffactory.EPdfFactory', 
 
              // 'tcpdfPath'=>'ext.pdffactory.vendors.tcpdf', //=default: the path to the tcpdf library
             // 'fpdiPath'=>'ext.pdffactory.vendors.fpdi', //=default: the path to the fpdi library
 
             // the cache duration
             'cacheHours'=>5, // -1 = cache disabled, 0 = never expires, hours if >0
 
              // The alias path to the directory, where the pdf files should be created
             'pdfPath'=>'application.runtime.pdf', 
 
              // The alias path to the *.pdf template files
             // 'templatesPath'=>'application.pdf.templates', //= default
 
             // the params for the constructor of the TCPDF class
             //  see: http://www.tcpdf.org/doc/code/classTCPDF.html 
             'tcpdfOptions'=>array(
                   /*  default values 
                      'format'=>'A4', 
                      'orientation'=>'P', //=Portrait or 'L' = landscape 
                      'unit'=>'mm', //measure unit: mm, cm, inch, or point 
                      'unicode'=>true, 
                      'encoding'=>'UTF-8', 
                      'diskcache'=>false, 
                      'pdfa'=>false, 
                     */
             )
         ), 
      ),             
            
            
	

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ajdelgados@gmail.com',
                'loginUrl' => 'login'
	),

    'language'=>'en',
    //'sourceLanguage'=>'es',
    'charset'=>'utf-8',
);
