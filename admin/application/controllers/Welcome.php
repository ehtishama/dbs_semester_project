<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this -> load -> helper('url');

		$filename = "some bad name with sapces and & dangerous characters #@!.jpg@!";
		$filename_parts = explode('.', $filename);
		$ext = end($filename_parts);
		unset($filename_parts[count($filename_parts) - 1]);
		$new_filename = implode('.', $filename_parts);

		
		$new_filename = $this -> security -> sanitize_filename($new_filename);
		$new_filename = url_title($new_filename);

		$new_filename .= time();
		echo $new_filename . "." . $ext;
		return $new_filename . "." . $ext;
	}
}
