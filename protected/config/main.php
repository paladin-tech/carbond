<?php

// uncomment the following to define a path alias
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name'       => 'Car Bond',
	'theme'      => 'carBond',

	// preloading 'log' component
	'preload'    => array('log'),

	// path aliases
	'aliases'    => array(
		'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
	),

	// autoloading model and component classes
	'import'     => array(
		'application.models.*',
		'application.components.*',
		'bootstrap.helpers.TbHtml',
		'bootstrap.behaviors.*',
		'bootstrap.widgets.*',
	),

	'modules'    => array(
		// uncomment the following to enable the Gii tool

		'gii'   => array(
			'class'          => 'system.gii.GiiModule',
			'password'       => 'cb1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'      => array('127.0.0.1', '::1'),
			'generatorPaths' => array('bootstrap.gii'),
		),
		'image' => array(
			'createOnDemand' => true, // requires apache mod_rewrite enabled
			'install'        => true, // allows you to run the installer
		),

	),

	// application components
	'components' => array(
		'user'         => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		'bootstrap'    => array(
			'class' => 'bootstrap.components.TbApi',
		),
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
//		'db'           => array(
//			'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database

		'db'           => array(
			'connectionString' => 'mysql:host=localhost;dbname=car_bond',
			'emulatePrepare'   => true,
			'username'         => 'root',
			'password'         => '',
			'charset'          => 'utf8',
			'enableProfiling'  => true,
		),

		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log'          => array(
//			'class'  => 'CLogRouter',
//			'routes' => array(
//				array(
//					'class'  => 'CFileLogRoute',
//					'levels' => 'error, warning',
//				),
//				// uncomment the following to show log messages on web pages
//				/*
//				array(
//					'class'=>'CWebLogRoute',
//				),
//				*/
//			),
			'class'  => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//					'ipFilters'=>array('127.0.0.1','192.168.1.215'),
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'     => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
	),
);