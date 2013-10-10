<?php

class Order extends Model {
    
    public static function fromCSV($data) {
        return new Order(array(
            'owner_email' => $data[0],
            'email' => $data[1],
            'first_name' => $data[2],
            'last_name' => $data[3],
            'address' => $data[4],
            'phone' => $data[5],
            'delivery_method' => $data[6],
            'credit_card_number' => $data[7],
            'expiry_date' => $data[8],
            'items' => json_decode($data[9])
        ));
    }
    
    public function toCSV() {
        return array(
            $this->email,
            $this->first_name,
        );
    }
}