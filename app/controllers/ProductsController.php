<?php

use \Wq\Repositories\ProductRepositoryInterface as ProductRepository;

class ProductsController extends BaseController {

    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index() {
        $products = $this->productRepository->all();
        return View::make('products.index')->with('products', $products);
    }

    public function show($code) {
        $product = $this->productRepository->find($code);
        return View::make('products.show')->with('product', $product);
    }
}