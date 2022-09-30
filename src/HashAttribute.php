<?php

namespace src;
use DateTimeInterface;
use Exception;
use Carbon\Carbon;
trait HashAttribute{
    protected $original = [];
    protected $casts = [];
    private $attributes = [];
    protected static $default_casts = [];
    public function getCasts(){
        if($this->casts !=""){
            return array_merge(self::$default_casts, $this->casts);
        }else{
            throw new Exception("Not having values yet!!");
        }
    }
    public function setAttributes(array $array){
        foreach ($array as $key => $val){
            $this->setAttribute($key,$val);
        }
        return $this;
    }
    public function castAttribute($key,$value){
        $key_type = $this->getCastType($key);
        if(!empty($key_type)){
            return $key_type."=>".$value;
        }
    }
    public function serializeDate(DateTimeInterface $date){
        return Carbon::instance($date)->toJSON();
    }
    public function setAttribute($key,$value){
        if ($this->isCastAttribute($key)) {
            $value = $this->castAttribute($key, $value);
        }
        $this->attributes[$key] = $value;

        return $this;
    }
    public function getAttributes(){
        if($this->attributes !==""){
           return $this->attributes; 
        }else{
            throw new Exception("Not having values yet!!");
        }
    }
    public function getAttribute($key){
        return $this->getAttributes()[$key] ?? null;
    }
    public function __get($name){
        return $this->getAttributes($name);
    }
    public function __set($key,$value){
        return $this->setAttribute($key,$value);
    }
    public function getCastType($key){
        return $this->getCasts()[gettype($key)];
    }
    public function isCastAttribute($key){
        $value = $this->getCasts();
        $check = in_array($key,$value);
        return $check;
    }
    public function getOriginal(){
         if($this->original !=""){
            return $this->original;
         }
    }
    public function setOriginal($original){
        if($this->original !=""){
            $this->original = $original; 
         }
    }
    public function AttributeToArray(){
        if(is_array($this->attributes) !== true){
             return array($this->attributes);
        }else{
            return $this->attributes;
        }
    }
    
}