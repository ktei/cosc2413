<?php

class Model {
    
    protected $attributes = array();

    public function __construct($data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
    
    public function __get($name) {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }
        return null;
    }

    public function __set($name, $value) {
        $this->attributes[$name] = $value;
    }

}
