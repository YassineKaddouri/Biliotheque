<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //return cart items
    public function index()
    {
        return view("cart.index")->with([
            "items" => \Cart::getContent()
        ]);
    }

    //add item to cart
    public function addProductToCart(Request $request, Livre $livre)
    {

        \Cart::add(array(
            "id" => $livre->id,
            "name" => $livre->titre,
            "price" => $livre->prix,
            "quantity" => $request->qte,
            "attributes" => array(),
            "associatedModel" => $livre,

        ));
        return redirect()->route("cart.index");


    }

    //update item on cart
    public function updateProductOnCart(Request $request, Livre $livre)
    {
        \Cart::update($livre->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qte
            ),
        ));
        return redirect()->route("cart.index");
    }
    //remove item from cart
    public function removeProductFromCart(Livre $livre)
    {
        \Cart::remove($livre->id);
        return redirect()->route("cart.index");
    }

}
