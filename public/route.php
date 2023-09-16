<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'client']);
$router->add('home', ['controller' => 'Home', 'action' => 'admin']);

//Payment routes 

$router->add('payment', ['controller' => 'UserController', 'action' => 'index']);

// Users routes
$router->add('users', ['controller' => 'UserController', 'action' => 'index']);
$router->add('users-create', ['controller' => 'UserController', 'action' => 'create']);
$router->add('users-store', ['controller' => 'UserController', 'action' => 'store']);
$router->add('users-edit', ['controller' => 'UserController', 'action' => 'edit']);
$router->add('users-update', ['controller' => 'UserController', 'action' => 'update']);
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





$router->dispatch($_SERVER['QUERY_STRING']);
