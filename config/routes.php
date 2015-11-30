<?php
use Cake\Routing\Router;

Router::plugin('Documents', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
