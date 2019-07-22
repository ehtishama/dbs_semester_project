<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
    private $product;

    
    // set product info here
    public function init($title, $desc, $price, $category, $tags, $image)
    {
    	$this -> product['title'] 		= $title;
    	$this -> product['description'] = $desc;
    	$this -> product['image']		= '';
    	$this -> product['price'] 		= $price;
    	$this -> product['category']	= $category;
    	$this -> product['tags']		= $tags;
    	$this -> product['image']		= $image;
    }

    public function insert_product()
    {

    	$this -> db -> reset_query();
    	return $this -> db -> insert('products', $this -> product);
    }


    public function get_all()
    {
        $query = $this -> db -> select("*")
                                ->from("products")
                                -> order_by("id", "desc");
        $result = $query -> get() -> result_array();
        return $result;
    }

    public function update($id)
    {
        $result = $this -> db  -> set($this -> product)
                            -> where('id', $id)
                            -> update('products');
        $this -> db -> reset_query();
        return $result;                            

    }
}