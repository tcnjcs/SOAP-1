<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/docs', array('controller' => 'pages', 'action' => 'display', 'docs'));
	Router::connect('/query', array('controller' => 'pages', 'action' => 'display', 'query'));
	Router::connect('/graph', array('controller' => 'pages', 'action' => 'display', 'graph'));
	Router::connect('/db', array('controller' => 'pages', 'action' => 'display', 'database'));
	Router::connect('/querytest', array('controller' => 'pages', 'action' => 'display', 'querytest'));
	Router::connect('/map', array('controller' => 'pages', 'action' => 'display', 'map'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'main')); 
	Router::connect('/politicians', array('controller' => 'politicians', 'action' => 'index'));
	Router::connect('/posts', array('controller' => 'posts', 'action' => 'index'));
	
	Router::connect('/brownfields', array('controller' => 'brownfields', 'action' => 'index'));
	Router::connect('/chemicals', array('controller' => 'chemicals', 'action' => 'index'));
	Router::connect('/facilities', array('controller' => 'facilities', 'action' => 'index'));
	Router::connect('/uploads', array('controller' => 'uploads', 'action' => 'upload'));
	
	// Cake homepage
	//Router::connect('/', array('controller' => 'posts', 'action' => 'index')); // Our page
	//Router::connect('/', array(‘controller’ => ‘pages’, ‘action’ => ‘display’, ‘home’));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();
	
/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

