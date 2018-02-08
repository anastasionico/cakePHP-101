<h1>Add Article</h1>
<?php
    echo $this->Form->create($article);
  	// 	the line above generates <form method="post" action="/articles/add">
    
    
    // 	$this->Form->control() method is used to create form elements of the same name.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>