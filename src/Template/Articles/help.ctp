<?php $this->extend('extended') ?>
<?= $this->element('sidebar') ?>
<?php foreach ($params as $param) : ?>
	
	<h2>
		<?= $param; ?>
	</h2>
 	
<?php endforeach ?>

<?php foreach ($users as $user) : ?>
	
	<h2>
		<?= $user->id .' '. $user->email ?>
	</h2>
 	
<?php endforeach ?>