<?php

use \Wq\Repositories\ProductRepositoryInterface as ProductRepository;

class CartController extends BaseController {

    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index() {
        $cartItems = array();
        if (Session::has('cart.items')) {
            $cartItems = Session::get('cart.items');
        }
        $items = array();
        foreach ($cartItems as $cartItem) {
            $product = $this->productRepository->find($cartItem->code);
            if ($product == null) {
                continue;
            }
            $items[] = new Model(array('code' => $cartItem->code, 'quantity' => $cartItem->quantity,
                'name' => $product->name, 'small_thumb_url' => $product->small_thumb_url));
        }

        return View::make('cart.index', array('items' => $items));
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


    public function clear() {
        Session::forget('cart.items');
    }

}