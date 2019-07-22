<?php
class Dashboard extends CI_Controller
{

    public function index()
    {
    	
        $this -> load -> helper('general_helper');
        validate();

        $data['title'] = "Dashboard -- Admin Panel";
        $data['sidebar_links'] = sidebar_links();
        $this -> load -> view("dashboard", $data);
        
    }
}