<?php namespace Wq\Repositories;

use Wq\IO\FileHelpers;
use \Wq\Repositories\UserRepositoryInterface as UserRepository;
use \Illuminate\Support\Facades\Auth as Auth;

class ProductRepository implements ProductRepositoryInterface {

    use FileHelpers;
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    public function all() {
        $list = array();
        if (($handle = $this->openFile(FILE_PRODUCTS)) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                $list[] = \Product::fromCSV($data);
            }
            fclose($handle);
        }
        $this->applyPrices($list);
        return $list;
    }

    public function find($code) {
        $list = array();
        if (($handle = $this->openFile(FILE_PRODUCTS)) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                if ($data[0] == $code) {
                    $list[] = \Product::fromCSV($data);
                    break;
                }
            }
            fclose($handle);
        }
        $this->applyPrices($list);
        return $list[0];
    }

    private function applyPrices($products) {
        if (Auth::check()) {
            $this->applySpecialPrices($products);
        } else {
            $this->applyGeneralPrices($products);
        }
    }

    private function applyGeneralPrices($products) {
        $dummyUser = $this->userRepository->find('FOO');
        foreach ($products as $product) {
            $this->applyPrice($product, $dummyUser->prices);
        }
    }

    private function applySpecialPrices($products) {
        $prices = Auth::user()->prices;
        foreach ($products as $product) {
            $this->applyPrice($product, $prices);
        }
    }

    private function applyPrice($product, $prices) {
        foreach ($prices as $price) {
            if ($price->pcode == $product->code) {
                $product->price = $price->price;
            }
        }
    }
}