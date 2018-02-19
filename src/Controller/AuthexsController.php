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

      public function error($param)
      {
         try {
             if($param > 10){
               throw new \Exception("One of the number is out of range[1-10].");
             }

         }catch(\Exception $ex){
            echo $ex->getMessage();
         }    




         
      }
   }
?>