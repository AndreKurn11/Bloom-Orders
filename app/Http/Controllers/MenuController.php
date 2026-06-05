<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $tableNumber = $request->query('meja');
        if ($tableNumber) {
            Session::put('tableNumber', $tableNumber);
        }

        $items = Item::where('is_active', 1)->orderBy('name','asc')->get();

        return view('customers.menu', compact('items', 'tableNumber'));
    }

    // Cart
    public function cart()
    {
        $cart = Session::get('cart');
        return view('customer.cart', compact('cart'));
    }
}
