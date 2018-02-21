<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;
class SessionsController extends AppController
{
	public function inizialize()
	{
		parent::inizialize();
		$this->loadComponent('flash');

	}

	public function write($value='')
	{
		$name = $this->request->getParam('pass');
		
		$session = $this->request->session();
		$session->write('name', $name);
		

	}

	public function read()
	{
		$session = $this->request->session();

		if($session->check('name'))
	     	$this->set('name',$session->read('name'));
        
	}

	public function destroy()
	{
		$session = $this->request->session();
		$session->destroy('name');
	}
}

