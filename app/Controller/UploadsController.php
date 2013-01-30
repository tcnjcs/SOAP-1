<?php

class UploadsController extends AppController {
	//var $name = 'Uploads';
       // var $helpers = array('Html', 'Form', 'FileUpload.FileUpload');
       // var $components = array('FileUpload.FileUpload');

    public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('upload'); //Allows anyone to upload files
	}

/*
    public function isAuthorized($user) {	
    
	    if ($this->action === 'upload' && $this->Auth->user('id') !== null) {
	        return true;
	    }
	    else
	    	return false;
	}
*/
    

    public function upload () {
	
//  	if ($file[‘error’] === UPLOAD_ERR_OK) 
//	{
		if ($this->request->is('post')) 
		{
			if (!empty($this->request->data['Upload']['External Source']))
			{
				//$rubyMessage = system("ruby /var/www/app/webroot/Ruby/brownTAB.rb", $something);
				echo exec("/usr/bin/ruby Ruby/brownTAB.rb");
				//debug($rubyMessage);
				//debug($something);
			}
		/*
			$file = $this->request->data['Upload']['Choose File'];
			$choice = $this->request->data['Upload']['Data Type'];

			$fileName = $file['tmp_name'];
			$filePath = WWW_ROOT.'Uploads'.DS.basename($file['tmp_name']); 
			move_uploaded_file($fileName, $filePath); //Move upload to webroot/Uploads folder
			switch($choice)
			{
				case 0:
					$messages = ClassRegistry::init('Brownfield')->upload($filePath);
					break;
				case 1:
					$messages = ClassRegistry::init('Chemical')->upload($filePath);
					break;
				case 2:
					$messages = ClassRegistry::init('Facility')->upload($filePath);
					break;
				case 3:
					$messages = ClassRegistry::init('Politician')->upload($filePath);
					break;
				default:
					$messages = ClassRegistry::init('Brownfield')->upload($filePath);

			}
		
			//debug($messages);
			//ob_flush();
			
			unlink($filePath); //Deletes uploaded file	
			$this->Session->setFlash('File has been uploaded!', 'uploadSuccess');
			$this->redirect(array('action' => 'upload'));
		*/
		}
//	}
/*	else
	{
		$this->Session->setFlash('Error uploading file. Please try again.', 'default', array('class' => 'span3'));
		$this->redirect(array('action' => 'upload'));
	}
*/

/*			      $this->data[‘Upload’][‘user_id’] = $this->Auth->user(‘id’);
			      $this->data[‘Upload’][‘name’] = $file[‘name’];
			      $this->data[‘Upload’][‘size’] = $file[‘size’];
			      $this->data[‘Upload’][‘type’] = $file[‘type’];
*/  
	}




/*	if(!empty($this->data)){
                if($this->FileUpload->success){
                    $this->set('photo', $this->FileUpload->finalFile);
                }else{
                    $this->Session->setFlash($this->FileUpload->showErrors());
                }
            }
*/
/*	if ($this->request->is('post'))
	{	
		//$this->Upload->create();	
		//if ($this->User->save($this->request->data)) {
                //	$this->Session->setFlash(__('The file has been uploaded.'));
                // 	$this->redirect(array('action' => 'upload'));
            	//} else {
                //	$this->Session->setFlash(__('The file could not be uploaded. Please, try again.'));
		//}
		//$messages = $this->Brownfield->import(importdatafile);
		//debug($messages);
	}
*/
//	$this->set('imports');
//    }
}
