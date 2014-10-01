<!-- File: /app/View/Posts/add.ctp -->

<div class="span2">
    <?php echo $this->element('sidebar'); ?>
</div>
<div class="span9">
    <a href="http://tardis.tcnj.edu/cabect/SOAP/index.php/posts">Back to posts</a>
    <br>
    <br>
    <h1>Add Post</h1>
    <?php
        echo $this->Form->create('Post');
        echo $this->Form->input('title');
        echo $this->Form->input('body', array('rows' => '3'));
        echo $this->Form->end('Save Post');
    ?>
</div>
