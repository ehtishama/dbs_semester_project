<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_test extends CI_Controller {

	public function index()
	{
	
		$json = '

			{
				
				"payment_methods": [
					{
						"name": "stripe",
						"pkey": "", 
						"skey": ""
					},
					{
						"name": "paypal",
						"pkey": "", 
						"skey": ""
					}

				]

	    	}

    	';

    	print(json_encode(json_decode($json, true), JSON_PRETTY_PRINT));
    	

	}

}

/* End of file Json_test.php */
/* Location: ./application/controllers/Json_test.php */