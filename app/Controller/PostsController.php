<?php

class PostsController extends AppController {
    public function index() {
         $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }
	public function add() {
	    if ($this->request->is('post')) {
	        $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash('Your post has been saved.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }
	}
    public function edit($id = null) {
	    $this->Post->id = $id;
	    if ($this->request->is('get')) {
	        $this->request->data = $this->Post->read();
	    } else {
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash('Your post has been updated.');
	            $this->redirect(array('action' => 'index'));
	        } else {
	            $this->Session->setFlash('Unable to update your post.');
	        }
	    }
	}
	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
	        $this->redirect(array('action' => 'index'));
	    }
	}
	function search(){
	    if (!empty($this->data)) {
	        $searchstr = $this->data['Post']['search'];
	        $this->set('searchstring', $this->data['Post']['search']);
	        $conditions = array(
	            'conditions' => array(
	            'or' => array(
	                "Post.title LIKE" => "%$searchstr%",
	                "Post.body LIKE" => "%$searchstr%"
	            )
	            )
	        );
	        $this->set('posts', $this->Post->find('all', $conditions));
	    }
	} 
	public function isAuthorized($user) {
	    if (parent::isAuthorized($user)) {
	        return true;
	    }

	    if ($this->action === 'add' && $this->Auth->user('id') !== null) {
	       // All registered users can add posts
	        return true;
	    }
	    
	    //if (in_array($this->action, array('edit', 'delete'))) {
	      //  $postId = $this->request->params['pass'][0];
	      //  return $this->Post->isOwnedBy($postId, $user['id']);
	    //}

	    return false;
	}
}
?>