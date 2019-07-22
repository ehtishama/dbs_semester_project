<?php
class Orders extends CI_Controller
{
	private $data;

	public function __construct()
	{
		parent:: __construct();
		$this -> load -> helper("general");
		$this -> load -> helper("url");
		$this -> load -> model("Orders_model");

		$this -> data['title'] = "Orders > Admin Panel";
		validate();
	}
    public function index()	
    {
    	$this -> data['sidebar_links'] = sidebar_links();
    	$this -> data['orders'] = $this -> Orders_model -> get_all();
        $this -> load -> view("orders", $this -> data);

    }
}