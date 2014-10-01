<?php
class CabectController extends AppController
{

	public function beforeFilter() {
		$this->Auth->allow('SOAP');
	}
	public function SOAP() 
	{
		$this->redirect(array('controller' => 'pages', 'action' => 'display', 'main'));
	}	

}?>
