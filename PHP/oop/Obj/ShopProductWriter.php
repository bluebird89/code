<?php
namespace Demo1;

// use Demo1\ShopProduct;
// require './ShopProduct.php';


class ShopProductWriter
{
    private array $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write()
    {
        $str = '';
        foreach ($this->products as $product) {
            $str .= "{$product->getTitle()}: ";
            $str .= "{$product->getProducer()}";
            $str .= " ({$product->getPrice()})\n";
        }
        print $str;
    }
}
