<?php

abstract class BaseModel {
    
    protected $attributes = array();
    
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
