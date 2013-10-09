<?php

class Product extends Model {

    public static function fromCSV($data) {
        return new Product(array(
            'code' => $data[0],
            'name' => $data[1],
            'small_thumb_url' => $data[2],
            'large_thumb_url' => $data[3],
            'description' => $data[4]
        ));
    }
}