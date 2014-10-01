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
    

    public function upload () 
	{
		if ($this->request->is('post')) 
		{
			if (!empty($this->request->data['Upload']['External Source']))
			{
				$message = exec("ruby Ruby/brownTAB.rb"); //Run ruby script that downloads external files.

				//Imports SQL statements to database.
				ClassRegistry::init('ConnectionManager');
				$db = ConnectionManager::getDataSource('debug');
				$handle = fopen("epaformat.sql", "r");
				$result = "";
				while (($row = fgets($handle)) !== FALSE)
				{
					$result = $db->execute($row);
					if(!$result)
					{
						$this->Session->setFlash("Failure!", 'uploadSuccess');
						break;
					}
				}
				
				if ($result) {
					$this->Session->setFlash("Success!", 'uploadSuccess');
				}
				fclose($handle);
				unlink("epaformat.sql");
				unlink("kcsnj.txt");			
				//debug($something);
			}
			else
			{
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
			}
		}
	}
}
