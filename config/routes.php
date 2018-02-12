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
});


Router::scope('/', function (RouteBuilder $routes) {
	
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
	$routes->redirect('/', ['controller' => 'Articles', 'action' => 'index']);   	
   
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

   
    $routes->fallbacks(DashedRoute::class);
});


Plugin::routes();







































