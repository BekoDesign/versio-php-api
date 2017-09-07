<?php

namespace BekoDesign\versioAPI\Models;


abstract class Model
{
    public function set($data) : void {
        foreach ($data AS $key => $value) {
            $this->{$key} = $value;
        }
    }
}