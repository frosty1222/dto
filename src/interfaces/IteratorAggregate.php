<?php 
namespace src\interfaces;

interface IteratorAggregate extends Traversable{
    public function getIterator();
}