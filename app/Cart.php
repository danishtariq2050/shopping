<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        if($item->discountprice != ''){
            $unitPrice = $item->discountprice;
        }

        else{
            $unitPrice = $item->price;
        }

        $storedItem = ['qty' => 0, 'price' => 0, 'item' => $item];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $storedItem['qty'] * $unitPrice;

        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $unitPrice;
        // $this->totalPrice = $this->totalPrice + $unitPrice;
    }

    public function remove($item, $id){
        if($item->discountprice != ''){
            $unitPrice = $item->discountprice;
        }

        else{
            $unitPrice = $item->price;
        }

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];

                if($storedItem['qty'] >= 2){
                    $storedItem['qty']--;
                    $storedItem['price'] = $storedItem['qty'] * $unitPrice;
                    $this->items[$id] = $storedItem;
                    $this->totalQty--;
                    $this->totalPrice -= $unitPrice;
                }
            }
        }
    }

    public function delete($id){
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
                $this->totalQty -= $storedItem['qty'];
                $this->totalPrice -= $storedItem['price'];
                $this->items[$id] = $storedItem;
                unset($this->items[$id]);
            }
        }
    }

    public function deleteAll(){
        unset($storedItem);
    }
}
