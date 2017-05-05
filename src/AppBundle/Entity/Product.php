<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=50)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="product_label", type="string", length=200)
     */
    private $productLabel;

    /**
     * @var int
     *
     * @ORM\Column(name="buy_price", type="integer")
     */
    private $buyPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="sales_price", type="integer")
     */
    private $salesPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="vat", type="string", length=255)
     */
    private $vat;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Product
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set productLabel
     *
     * @param string $productLabel
     *
     * @return Product
     */
    public function setProductLabel($productLabel)
    {
        $this->productLabel = $productLabel;

        return $this;
    }

    /**
     * Get productLabel
     *
     * @return string
     */
    public function getProductLabel()
    {
        return $this->productLabel;
    }

    /**
     * Set buyPrice
     *
     * @param integer $buyPrice
     *
     * @return Product
     */
    public function setBuyPrice($buyPrice)
    {
        $this->buyPrice = $buyPrice;

        return $this;
    }

    /**
     * Get buyPrice
     *
     * @return int
     */
    public function getBuyPrice()
    {
        return $this->buyPrice;
    }

    /**
     * Set salesPrice
     *
     * @param integer $salesPrice
     *
     * @return Product
     */
    public function setSalesPrice($salesPrice)
    {
        $this->salesPrice = $salesPrice;

        return $this;
    }

    /**
     * Get salesPrice
     *
     * @return int
     */
    public function getSalesPrice()
    {
        return $this->salesPrice;
    }

    /**
     * Set vat
     *
     * @param string $vat
     *
     * @return Product
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Get vat
     *
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }
}

