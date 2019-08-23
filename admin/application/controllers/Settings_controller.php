<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_controller extends CI_Controller {
	private $data;
	public function __construct()
	{
		parent::__construct();
		$this -> load -> helper(array("general", "url", "form"));
		validate();


		$this -> data['sidebar_links'] = sidebar_links();
		$this -> data['title'] = "Settings > Admin Panel";

		// $this -> load -> library("general");
		
	}
	public function index()
	{
		if($this -> input -> post("update_config"))
		{
			$this -> update_config();
			return;
		}
		$this -> data['prefrences'] = [];
		$prefrences = $this -> db -> get("global_prefrences") -> result_array();
		foreach ($prefrences as $prefrence) {
			$prefKey = $prefrence['pref'];
			$this -> data["prefrences"][$prefKey] =    $prefrence['value'];
		}
		$this -> load -> view("settings", $this -> data);
	}
	public function update_config()
	{
		$title = $this -> input -> post("title");
		$tagline = $this -> input -> post("tagline");
		$description = $this -> input -> post("description");
		$email = $this -> input -> post("email");

		$this -> db -> set("value", $title)
		-> where("pref", "site_title");
		$this -> db -> update("global_prefrences");

		$this -> db -> set("value", $tagline)
		-> where("pref = 'site_tagline' ");
		$this -> db -> update("global_prefrences");

		$this -> db -> set("value", $description)
		-> where("pref = 'site_description' ");
		$this -> db -> update("global_prefrences");

		$this -> db -> set("value", $email)
		-> where("pref = 'site_email' ");
		$this -> db -> update("global_prefrences");

		redirect("settings");


	}

}

/* End of file Settings_controller.php */
/* Location: ./application/controllers/Settings_controller.php */