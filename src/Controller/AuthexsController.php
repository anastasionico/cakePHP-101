<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\ORM\TableRegistry;
   use Cake\Datasource\ConnectionManager;
   use Cake\Event\Event;
   use Cake\Auth\DefaultPasswordHasher;

   class AuthexsController extends AppController{
      var $components = array('Auth');
      public function index(){
      }
      public function login(){
         if($this->request->is('post')){
            $user = $this->Auth->identify();
            
            if($user){
               $this->Auth->setUser($user);
               return $this->redirect($this->Auth->redirectUrl());
            } else
            $this->Flash->error('Your username or password is incorrect.');
         }
      }
      public function logout(){
         return $this->redirect($this->Auth->logout());
      }
   }
?>