<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_io
{
	protected $ci;
	protected $file;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this -> file = NULL;
	}

	public function write($filename, $data)
	{
		$file = $this -> read($filename);
		array_push($file, $data);

		$data = json_encode($file, JSON_PRETTY_PRINT);
		file_put_contents($filename, $data);
	}

	public function read($filename)
	{
		if(file_exists($filename))
			return json_decode(file_get_contents($filename), true);
		return false;
	}

	

}

/* End of file Json_io.php */
/* Location: ./application/libraries/Json_io.php */
