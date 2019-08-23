<?php 
class Orders_model extends CI_Model
{
    public function get_all()
    {

		$this -> db -> select("orders.id as order_id, customer_id, charges, created_at, status, updated_at, first_name, last_name, email")
					-> from("orders")
					-> join("customers", "customers.id = orders.customer_id")
                    -> order_by("created_at", "desc")
                    ;
		$result = $this -> db -> get() -> result_array();
		

    	return $result;
    }


    public function order($id)
    {
		$this -> db -> select("orders.id as order_id, customer_id, charges, created_at, status, updated_at, first_name, last_name, email")
					-> from("orders")
					-> where("orders.id", $id)
					-> join("customers", "customers.id = orders.customer_id");
					


		return $this -> db -> get() -> result_array()[0];    				
    }

    public function ordered_products($order_id)
    {
    	$this -> db -> select("*")	
    				-> from ("ordered_products")
                    -> join("products", "products.id = ordered_products.prod_id")
    				-> where("order_id", $order_id);

    	return $this -> db -> get() -> result_array();
    }

    /**
     * returns the shipment address of an order specified by order_id
     */
    public function address($order_id)
    {
        $this -> db -> select("*")
                    -> from("address")
                    -> join("orders", "orders.shipment_address = address.address_id")
                    -> where("orders.id = $order_id");

        return $this -> db -> get() -> result_array()[0];
    }

    public function shipment_details($id)
    {
        $this -> db -> select("*") 
                    -> from("shipped_orders") 
                    -> join("shipment_providers", "shipped_orders.carrier_id = shipment_providers.id")
                    -> where("order_id = $id");
        return $this -> db -> get() -> result_array();

    }

    public function available_shipment_carriers()
    {
        return $this -> db -> get('shipment_providers') -> result_array();
    }

    /** 
    * returns all the orders placed by a specific customers
    * $customer_id specifies a unique customer
    */
     
    public function orders_by_customer($customer_id)
    {
        $this -> db -> select("*")
            -> from("orders")
            -> where("customer_id = $customer_id")
            ;

        return $this -> db -> get() -> result_array();
    }

}