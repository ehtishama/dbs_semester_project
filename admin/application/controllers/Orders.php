<?php
class Orders extends CI_Controller
{
	private $data;

	public function __construct()
	{
		parent:: __construct();

		$this -> load -> helper("general");
		$this -> load -> helper("url");
		$this -> load -> helper("form");

		validate();

		$this -> load -> model("Orders_model");

		$this -> data['title'] = "Orders > Admin Panel";
		$this -> data['sidebar_links'] = sidebar_links();
		
	}
    public function index()	
    {
    	
    	$this -> data['orders'] = $this -> Orders_model -> get_all();
        $this -> load -> view("orders", $this -> data);

    }


    public function single_order($id)
    {
    	$this -> data["order"] = $this -> Orders_model -> order($id);
    	$this -> data["ordered_products"] = $this -> Orders_model -> ordered_products($id);
    	$this -> data['address'] = $this -> Orders_model -> address($id);
        $this -> data['shipments'] = $this -> Orders_model -> shipment_details($id);
        $this -> data['shipment_providers'] = $this -> Orders_model -> available_shipment_carriers();


    	$this -> load -> view("single_order", $this -> data);
    }

    public function update_status($id)
    {
    	if($this -> input -> post("update-order")):
    		$status = $this -> input -> post("status");
    		
    		$this -> db -> set("status", $status)
    					-> where("id = $id");
    		if($this -> db -> update("orders"))
    			$this -> data['success'] = "order status updated successfully.";


    	endif;

    	$this -> single_order($id);
    }

    public function add_shipping($id)
    {
    	if($this -> input -> post("add-shipping-carrier")){
    		$tracking_id = $this -> input -> post("tracking_id");
    		$shipped_date = $this -> input -> post("date");
    		$carrier = $this -> input -> post("carrier");
    		
    		$row = array(
    			'carrier_id' => $carrier,
    			'order_id'   => $id,
    			'shipped_date' => $shipped_date,
    			'tracking_id' => $tracking_id
    		);

    		if($this -> db -> insert("shipped_orders", $row))
    			$this -> data['success'] = "Shipment Details added successfully.";
    		else $this -> data['error'] = "There was some error";
        }
    	

    	$this -> single_order($id);
    }



}