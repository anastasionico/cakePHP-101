 <?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/articles', ['controller' => 'Articles'], function ($routes) {
    $routes->connect('/tagged/*', ['action' => 'tags']);
    $routes->connect('/help/:message-:code',['action' => 'help'])
    ->setPass(['message', 'code']);
    $routes->connect('extended', ['action' => 'extended']);
    $routes->connect('elements', ['action' => 'Elems']);
});

Router::scope('/auth', ['controller' => 'Authxs'], function($routes){
    $routes->connect('/error:param', ['action' => 'error'])
    ->setPass(['param']);
});

Router::scope('/session', ['controller' => 'Sessions'], function($routes){
    $routes->connect('/write:value', ['action' => 'write'])
    ->setPass(['value']);
    $routes->connect('/read', ['action' => 'read']);
    $routes->connect('/destroy', ['action' => 'destroy']);
});


Router::scope('/', function (RouteBuilder $routes) {
	
    // $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
	$routes->redirect('/', ['controller' => 'Articles', 'action' => 'index']);   	
   
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

   
    $routes->fallbacks(DashedRoute::class);
});


Plugin::routes();




































