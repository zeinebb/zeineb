<?php

namespace AppBundle\Product;

use Symfony\Component\Validator\Constraints as Assert;

class product{
    
    /**
     * @Assert\NotBlank()
     * @assert\Length(max=200)
     */
    private $reference;
    /**
     * @assert\Length(max=50)
     */
    private $product_label;
    /**
     * @assert\Length(max=20)
     */
    private $buy_price;
    /**
     * @assert\Length(max=20)
     */
    private $sales_price;
    /**
     * @assert\Length(max=20)
     */
    private $vat;
    /**
     * @Assert\NotBlank()
     * @assert\Length(max=100)
     */
    function getReference() {
        return $this->reference;
    }

    function getProduct_label() {
        return $this->product_label;
    }

    function getBuy_price() {
        return $this->buy_price;
    }

    function getSales_price() {
        return $this->sales_price;
    }

    function getVat() {
        return $this->vat;
    }

    function setReference($reference) {
        $this->reference = $reference;
    }

    function setProduct_label($product_label) {
        $this->product_label = $product_label;
    }

    function setBuy_price($buy_price) {
        $this->buy_price = $buy_price;
    }

    function setSales_price($sales_price) {
        $this->sales_price = $sales_price;
    }

    function setVat($vat) {
        $this->vat = $vat;
    }


   
}  
