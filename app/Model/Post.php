<?php
class Post extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
    var $name = 'Post';
    var $hasMany = array('Comment'=>array('className'=>'Comment'));
    
    public function isOwnedBy($post, $user) {
     return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
}
}
?>
