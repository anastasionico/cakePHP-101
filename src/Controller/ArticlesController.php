<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class ArticlesController extends AppController
{
	public function inizialize()
	{
		parent::inizialize();

		$this->loadComponent('Paginator');
		$this->loadComponent('flash');
}

	// 	By defining function index() in our ArticlesController, users can now access the logic there by requesting www.example.com/articles/index
	public function index()
	{
		/* 
			Our controller action is very simple. 
		 	It fetches a paginated set of articles from the database, using the Articles Model that is automatically loaded via naming conventions
		*/
		$this->loadComponent('Paginator');
		$articles = $this->Paginator->paginate($this->Articles->find());
		
		// 	It then uses set() to pass the articles into the Template
		$this->set(compact('articles'));
	}

	public function view($slug = null)
	{
		/*
			The method findBySlug is a cakePHP dynamic finder,
			This method allows us to create a basic query that finds articles by a given slug. 
			We then use firstOrFail() to either fetch the first record, or throw a NotFoundException
		*/
		$article = $this->Articles->findBySlug($slug)->firstOrFail();
		$this->set(compact('article'));
	}

	public function add()
	{
		$article = $this->Articles->newEntity();
		
		if($this->request->is('post')){
			
			// If the HTTP method of the request was POST, try to save the data using the Articles model.
			$article = $this->Articles->patchEntity($article, $this->request->getData());

			$article->user_id = 1;

			// If for some reason it doesn’t save, just render the view. This gives us a chance to show the user validation errors or other warnings.
			if($this->Articles->save($article)){
				$this->Flash->success(__('Your Article has been saved'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to add your article'));

			
		}
		$this->set('article', $article);
	}

	public function edit($slug = null)
	{
		// This action first ensures that the user has tried to access an existing record
		$article = $this->Articles->findBySlug($slug)->firstOrFail();
		
		// the action checks whether the request is either a POST or a PUT request.
		if($this->request->is(['post', 'put'])){
			// we use the POST/PUT data to update our article entity by using the patchEntity() method
			$this->Articles->patchEntity($article, $this->request->getData());

			if($this->Articles->save($article)){
				$this->Flash->success(__('Your article has been updated'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your article'));
		}

		$this->set('article', $article);
	}

	public function delete($slug = null)
	{
		// If the user attempts to delete an article using a GET request, allowMethod() will throw an exception.
		$this->request->allowMethod('post','delete');
		

		$article = $this->Articles->findBySlug($slug)->firstOrFail();
	
		if($this->Articles->delete($article)){
			$this->Flash->success(__('The {0} article has been deleted.', $article->title));
			return $this->redirect(['action' => 'index']);
		}
	}



        	
    	    
    

}