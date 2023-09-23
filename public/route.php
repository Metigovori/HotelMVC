<?php

/**
 * Routing
 */
$router = new Core\Router();




// Home  routes
$router->add('', ['controller' => 'HomeController', 'action' => 'client']);
$router->add('homepage', ['controller' => 'HomeController', 'action' => 'client']);
$router->add('home', ['controller' => 'HomeController', 'action' => 'admin']);




$router->add('login-form', ['controller' => 'AuthController', 'action' => 'loginForm']);
$router->add('login-store', ['controller' => 'AuthController', 'action' => 'loginStore']);
$router->add('logout', ['controller' => 'AuthController', 'action' => 'logout']);

// Users routes
$router->add('users', ['controller' => 'UserController', 'action' => 'index']);
$router->add('users-create', ['controller' => 'UserController', 'action' => 'store']);
$router->add('users-store', ['controller' => 'UserController', 'action' => 'store']);
$router->add('users-edit', ['controller' => 'UserController', 'action' => 'update']);
$router->add('users-delete', ['controller' => 'UserController', 'action' => 'destroy']);

// Inventory routes

$router->add('inventory', ['controller' => 'InventoryController', 'action' => 'index']);
$router->add('inventory-create', ['controller' => 'InventoryController', 'action' => 'store']);
$router->add('inventory-edit', ['controller' => 'InventoryController', 'action' => 'update']);
$router->add('inventory-delete', ['controller' => 'InventoryController', 'action' => 'destroy']);
$router->add('inventory-store', ['controller' => 'InventoryController', 'action' => 'store']);

//Rooms routes

$router->add('settings', ['controller' => 'RoomController', 'action' => 'index']);
$router->add('room', ['controller' => 'InventoryController', 'action' => 'store']);
$router->add('inventory-edit', ['controller' => 'InventoryController', 'action' => 'update']);
$router->add('roomAdd', ['controller' => 'RoomController', 'action' => 'roomAdd']);
$router->add('room-create', ['controller' => 'RoomController', 'action' => 'store']);
$router->add('room-delete', ['controller' => 'RoomController', 'action' => 'destroy']);
$router->add('roomDel', ['controller' => 'RoomController', 'action' => 'roomDel']);

//RoomBook


$router->add('show', ['controller' => 'RoombookController', 'action' => 'show']);
$router->add('roombook', ['controller' => 'RoombookController', 'action' => 'roomBook']);
$router->add('confirm', ['controller' => 'RoombookController', 'action' => 'confirmBooking']);
$router->add('reservation', ['controller' => 'RoombookController', 'action' => 'reservation']);
$router->add('create-reservation', ['controller' => 'RoombookController', 'action' => 'create']);


//Contact
$router->add('messages', ['controller' => 'ContactController', 'action' => 'index']);
$router->add('newsletter', ['controller' => 'ContactController', 'action' => 'store']);


//Payment routes 

$router->add('payment', ['controller' => 'PaymentController', 'action' => 'index']);







$router->dispatch($_SERVER['QUERY_STRING']);
