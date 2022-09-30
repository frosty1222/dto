<?php 
namespace src;
use src\interfaces\Arrayable;
use src\interfaces\Jsonable;
use src\HashAttribute;
abstract class Datas implements Arrayable,Jsonable{
    use HashAttribute;
    public static function from($attributes =[]){
        $instance = new static();
        return $instance->setAttributes($attributes);
    }
    public function toArray(){
        return $this->AttributeToArray();
    }
    public function toJson($options){
        return json_encode($this->toArray(), $options);
    }
    public function test(){
        return "test function";
    }
    public static function collection($items): Collection
    {
        // truyền vào một callback function
        $items = array_map(function ($items) {
            if ($items instanceof static) {
                return $items;
            }
            return static::from($items);
        }, $items);
        // trả về một collection mới với thông số đầu vào là một callback function 
        return new Collection($items);
    }
}