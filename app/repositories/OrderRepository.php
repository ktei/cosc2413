<?php namespace Wq\Repositories;

use Wq\IO\FileHelpers;

class OrderRepository implements OrderRepositoryInterface {
    
    use FileHelpers;
    
    public function findAll($email) {
        $list = array();
        if (($handle = $this->openFile(FILE_ORDERS)) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                $list[] = \Order::fromCSV($data);
            }
            fclose($handle);
        }
        return $list;
    }
    
    public function create($order) {
        if (($handle = $this->openFile(FILE_ORDERS, 'a')) !== FALSE) {
            $row = $order->toCSV();
            fputcsv($handle, $row, "\t");
            fclose($handle);
        }
    }
}