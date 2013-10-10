<?php namespace Wq\Repositories;

use Wq\IO\FileHelpers;

class OrderRepository implements OrderRepositoryInterface {
    
    use FileHelpers;
    
    public function find($email) {
        
    }
    
    public function create($order) {
        if (($handle = $this->openFile(FILE_ORDERS, 'a')) !== FALSE) {
            $row = $order->toCSV();
            fputcsv($handle, $row, "\t");
            fclose($handle);
        }
    }
}