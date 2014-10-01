<?php
// app/Controller/UsersController.php

App::uses('FB', 'Facebook.Lib');
App::uses('FacebookInfo', 'Facebook.Lib');
App::uses('Facebook', 'Facebook.Lib');

class UsersController extends AppController {
	
    public $helpers = array('Facebook.Facebook');
    
    public function beforeFilter() {
        parent::beforeFilter();	//Allows anyone to call index, view, and display.
        $this->Auth->allow('add', 'logout');	//Allows anyone to call add and logout.
        //$this->Auth->autoRedirect = false;	//Manual redirect set.
		//$this->Auth->flashElement = "invalidCredentials";	//Choose element to call for flash
    }

	public function login() {
	$this->layout = 'login';
    	if ($this->request->is('post')) {
        	if ($this->Auth->login()) {
            	$this->redirect($this->Auth->redirect());
            	//$this->redirect($this->referer());	//Returns back to last page.
        	} 
        	else {
            	//$this->Session->setFlash(__('Invalid username or password. try again plz.'));
        		//$this->Session->setFlash('Invalid username or password. Please try again.', 'invalidCredentials');
        		$this->Session->setFlash('Invalid username or password. Please try again.'); //The element "errorMessage" is called in the View file login.ctp to display this error. 

        		$this->redirect($this->referer());


        	}
    	}
	}
	
    public function logout() {
        $this->Connect->FB->destroysession();
        $this->Session->destroy();
        $this->Auth->logout();
        $this->redirect('/');
    }
	
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function dashboard() {
        $userId = $this->Session->read('Auth.User.username');
        if ($userId !== null)
        {
        	$this->set('username', $userId);
        }

    }
    
    public function isAuthorized($user) {	//Checks to see if a user is logged in. If not, access is denied.
    
	    if ($this->action === 'dashboard' && $this->Auth->user('id') !== null) {
	       // Registered users can view the dashboard
	        return true;
	    }
	    else if ($this->action === 'delete' && $user['role'] === 'admin')
	    	return true;
	    	
	    else
	    	return false;
	}

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
	$this->layout = 'login';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Account has been created. Welcome to SOAP!', 'uploadSuccess');
                $this->redirect(array('controller' => 'pages', 'action' => 'main'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
?>
