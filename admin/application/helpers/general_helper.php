<?php 
	function sidebar_links()
    {
        return array(
            array("title" => "Dashboard",   "link" => "dashboard", "icon" => "svg/window.svg"),
            array("title" => "Inbox",   "link" => "inbox", "icon" => "svg/inbox.svg"),
            array("title" => "Products",    "link" => "all-products", "icon" => "svg/stack.svg", 

                "sublinks" => array(
                                    array("title" => "All Products", "link" => "all-products"),
                                    array("title" => "Add new Product", "link" => "insert-product"),
                                    array("title" => "Categories", "link" => "product-categories"),
                    )
            ),
            array("title" => "Orders",       "link" => "orders", "icon" => "svg/cat.svg"),
            array("title" => "Payment Processors",       "link" => "payments", "icon" => "svg/dolar.svg"),
            array("title" => "Analysis",    "link" => "analysis", "icon" => "svg/time.svg"),
            array("title" => "Customers",       "link" => "users", "icon" => "svg/people.svg"),
            array("title" => "Shipping", "link" => "shipping", "icon" => "svg/transport.svg"),
            array("title" => "Settings", "link" => "settings", "icon" => "svg/settings.svg")
        );
    }

    function validate()
    {
    	$ci =& get_instance();
    	$ci -> load -> library('Ion_auth');
    	if(! $ci -> ion_auth -> logged_in())
    		redirect('login');
    	else return true;

    }

    function m_sanitize_filename($filename)
    {
        $ci =& get_instance();

        $ci -> load -> helper('url');
        $filename_parts = explode('.', $filename);
        $ext = end($filename_parts);

        if(count($filename_parts ) > 0)
            unset($filename_parts[count($filename_parts) - 1]);
        
        $new_filename = implode('.', $filename_parts);

        
        $new_filename = $ci -> security -> sanitize_filename($new_filename); // sanitize
        $new_filename = url_title($new_filename);                            // slug       
        $new_filename .= time();                                             // timestamp   
        
        return $new_filename . "." . $ext;
    }

    /*
    *   Function: m_upload_image()
    *   Description: 
    *       uplaods the picture submitted via form to a specified location.
    *   $name is value of 'name' attribute on input field
    */
    function m_upload_image($name, $upload_path = "uploads/")
    {
        if(empty($name))
            return false;

        $ci =& get_instance();
        $ci -> load -> library("upload");


        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 1024  * 4;
        $config['max_height']           = 768   * 4;
        
        $filename = $_FILES[$name]['name']; // look for $_FILE global array
        $new_filename = m_sanitize_filename($filename);

        $config['file_name']             = $new_filename;

        $ci -> upload -> initialize($config);
        if($ci -> upload -> do_upload($name))
            return $upload_path . $new_filename;
        else 
            return false;

    }
 ?>