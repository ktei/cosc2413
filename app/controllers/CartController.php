<?php

use \Wq\Repositories\ProductRepositoryInterface as ProductRepository;

class CartController extends BaseController {

    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->beforeFilter('auth');
        $this->productRepository = $productRepository;
    }

    public function index() {
        $cartItems = $cartItems = $this->retrieveCartItems();
        $items = array();
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $product = $this->productRepository->find($cartItem->code);
            if ($product == null) {
                continue;
            }
            $items[] = new Model(array('code' => $cartItem->code, 'quantity' => $cartItem->quantity,
                'name' => $product->name, 'small_thumb_url' => $product->small_thumb_url,
                'price' => $product->price));
            $totalPrice += ($product->price * $cartItem->quantity);
        }

        return View::make('cart.index', array('items' => $items, 'total_price' => $totalPrice));
    }


    public function add() {
        $code = Input::get('code');
        $quantity = Input::get('quantity');
        $product = $this->productRepository->find($code);
        if ($product != null) {
            $items = array();
            if (!Session::has('cart.items')) {
                Session::put('cart.items', $items);
            }
        }
        Session::push('cart.items', new Model(array('code' => $code, 'quantity' => $quantity)));
        return Redirect::action('CartController@index');
    }
    
    public function remove($code) {
        $cartItems = $this->retrieveCartItems();
        for ($i = 0; $i < count($cartItems); $i++) {
            $current = $cartItems[$i];
            if ($current->code == $code) {
                unset($cartItems[$i]);
            }
        }
        
        // Fix up the indices
        $newCartItems = array();
        foreach ($cartItems as $cartItem) {
            $newCartItems[] = $cartItem;
        }
        Session::put('cart.items', $newCartItems);
        $this->flashSuccess("Product has been removed from your cart.");
        return Redirect::action('CartController@index');
    }


    public function clear() {
        Session::put('cart.items', array());
        $this->flashSuccess('Your cart has been cleared.');
        return Redirect::action('CartController@index');
    }
    
    private function retrieveCartItems() {
        $cartItems = array();
        if (Session::has('cart.items')) {
            $cartItems = Session::get('cart.items');
        }
        return $cartItems;
    }

}