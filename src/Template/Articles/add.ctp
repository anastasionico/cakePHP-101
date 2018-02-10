<h1>Add Article</h1>
<?php
    // 	the below above generates <form method="post" action="/articles/add">
    echo $this->Form->create($article);
  	
    // 	$this->Form->control() method is used to create form elements of the same name.
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>