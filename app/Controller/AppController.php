<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

App::uses('Controller', 'Controller');
App::uses('FB', 'Facebook.Lib');
App::uses('FacebookInfo', 'Facebook.Lib');
App::uses('Facebook', 'Facebook.Lib');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

public $helpers = array('Html', 'Form', 'Facebook.Facebook', 'Session');

public $components = array(
    'Session',
    'Auth' => array(
        'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'main'),
        'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'main'),
        'authorize' => array('Controller'), // Added this line
    ),
    'Facebook.Connect' => array('model' => 'User')
);

public function isAuthorized($user) {
if (isset($user['role']) && $user['role'] === 'admin') {
return true; //Admin can access every action
}
return false; // The rest don't
}

public function beforeFacebookSave() {
$this->Connect->authUser['User']['username'] = $this->Connect->user('name');
$this->Connect->authUser['User']['role'] = 'user';
return true; //We added this function and the user can now be stored in the database
}

public function afterFacebookLogin(){
    //Logic to happen after successful facebook login.
     //if($this->Facebook->getUser() != null)
     //$this->User->username = $this->Facebook->getUser(); //Not working
     //echo $this->Facebook->getUser();
     //$this->$userId != null;
}

    public function beforeFilter() {
        $this->Auth->allow('index', 'view', 'display', 'loadTable'); //Allows anyone to call index, view, and display.
//$this->Auth->loginError = 'Invalid Credentials. Try again please!';

        // $this->set('facebook_name', $this->Connect->user('name'));
// if ($this->Connect->user('name') != null)
// {
//
// }
        //Can also use deny depending on scenario.
    }
}


