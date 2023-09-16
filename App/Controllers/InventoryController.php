<?php

namespace App\Controllers;

use App\Models\Inventory;
use \Core\View;
use \Core\Controller;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::orderBy('id', 'desc')->get();
        View::renderTemplate('Inventory/inventory.html', ['inventory' => $inventory]);
    }

    public function create()
    {
        View::renderTemplate('Inventory/inventory.html');
    }

    public function store()
    {
        $inventoryItem = new Inventory();
        $inventoryItem->productName = $_POST['productName'];
        $inventoryItem->quantity = $_POST['quantity'];
        $inventoryItem->price = $_POST['price'];
        $inventoryItem->message = $_POST['message'];
        $inventoryItem->save();
        header("Location: /inventory");
    }

    public function show()
    {
        // Implement if needed
    }

    public function edit()
    {
        $inventoryItem = Inventory::findOrFail($_POST['id']);
        View::renderTemplate('Inventory/inventory.html', ['inventoryItem' => $inventoryItem]);
    }

    public function update()
    {
        $inventoryItem = Inventory::findOrFail($_POST['id']);
        $inventoryItem->productName = $_POST['productName'];
        $inventoryItem->quantity = $_POST['quantity'];
        $inventoryItem->price = $_POST['price'];
        $inventoryItem->message = $_POST['message'];
        $inventoryItem->update();
        header("Location: /inventory");
    }

    public function destroy()
    {
        $inventoryItem = Inventory::findOrFail($_POST['id']);
        $inventoryItem->delete();
        header("Location: /inventory");
    }

    public function lowInventory()
    {
        $threshold = 10; // You can adjust the threshold as needed
        $lowInventoryItems = Inventory::getLowInventoryProducts($threshold);
        View::renderTemplate('Inventory/low_inventory.html', ['lowInventoryItems' => $lowInventoryItems]);
    }
}
