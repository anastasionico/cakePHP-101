<?php
   echo $this->Form->create();
   echo $this->Form->input('email');
   echo $this->Form->input('password');
   echo $this->Form->button('Submit');
   echo $this->Form->end();
?>