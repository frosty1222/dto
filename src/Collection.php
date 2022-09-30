<?php 
namespace src;

use src\interfaces\CollectionInterface;
class Collection implements CollectionInterface{
    private $element = [];
    public function __construct(array $elements)
    {
        $this->element = $elements;
    }
    //Phương thức __toString() sẽ được gọi khi chúng ta dùng đối tượng như một string.
    public function __toString()
    {
        return implode($this->element);
    }
    // gọi hàm getiterator trong php 

    public function getIterator(){
        return $this->getIterator();
    }
    //Hàm offsetExists sẽ được gọi khi chúng ta gọi hàm isset để kiểm tra một key
    public function offsetExists($offset){
        return isset($this->element[$offset]);
    }
    //Hàm offsetGet được gọi khi chúng ta get một thuộc tính của object(ở đây là class Collection của chúng ta) như một array.
    public function offsetGet($offset){
        return isset($this->element[$offset]) ? $this->element[$offset] : null;
    }
    // hàm này gọi khi ta gán một giá trị cho collection
    public function offsetSet($offset,$value){
        if (is_null($offset)) {
            $this->element[] = $value;
        } else {
            $this->element[$offset] = $value;
        }
    }
    //Hàm offsetUnset sẽ được gọi khi chúng ta sử dụng hàm unset,bỏ đặt một biến 
    public function offsetUnset($offset){
        unset($this->element[$offset]);
    }
    // function  biến một object thành một array
    public function toArray()
    {
        return (array) $this;
    }
    // hàm đếm 
    public function count($v =[])
    {
         if($v !=""){
            return count($v);
         }
    }
    // hàm trả về true nếu object là rỗng or false 
    public function isEmpty(){
          if(empty($this)){
            return true;
          }
          return false;
    }
    // trả về một object rỗng 
    public function clear(){
       return $this->element = [];
    }
    // thêm giá trị vào array
    public function add($element){
        return array_push($this->element,$element);
    }
    // cắt một array
    public function slice($offset,$length){
       return array_slice($offset,$length);
    }
    // trả về key đầu tiên của chính object 
    public function first(){
        if($this->isEmpty() ==false){
            return $this->element[0];
        }
    }
    public function last(){
        if($this->isEmpty() == false){
            return end($this->element);
        }
        
    }
    public function map($callback){
        return array_map($callback,$this->element);
    }
    public function filter($callback){
        return array_filter($this->element,$callback,ARRAY_FILTER_USE_BOTH);
    }
    public function all(){
        return $this->element;
    }
    public function toJson($option){
        return json_encode($option);
    }
    public function test(){
        return "this is test function";
    }

}