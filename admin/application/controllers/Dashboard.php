<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();

		$this -> load -> model("Dashboard_model");
		$this -> data['highlights'] = 
        
        $this -> Dashboard_model -> get_highlights();
        $this ->data['title'] = "Dashboard > Admin Panel";
    }

    public function index()
    {
        // find some data for dashboard
        $this -> load -> helper('general_helper');
        validate();

        $this ->data['sidebar_links'] = sidebar_links();
        $this -> load -> view("dashboard", $this ->data);
        
    }

    public function getWeekSalesJson()
    {
        $data = array();
        // previous 7 days in order
        for($i=0; $i<7; $i++)
        {
             $day = date("l", strtotime("-$i day"));
             $data[$day] = 0;
        }
        $this -> db -> select("count(*) n, DATE(created_at) date")
        -> from("orders")
        -> where("DATE(created_at) >= DATE(NOW()) - INTERVAL 7 DAY")
        -> group_by("date");

        $weekly  = $this -> db -> get() -> result_array();
        foreach ($weekly as $daily) {
            $day = date("l", strtotime($daily['date']));
            // $day = strtolower($day);
            $count = $daily['n'];
            $data[$day] = $count;
        }

        print json_encode($data);

    }
}