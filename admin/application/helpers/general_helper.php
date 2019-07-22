<?php 
	function sidebar_links()
    {
        return array(
            array("title" => "Dashboard",   "link" => "dashboard", "icon" => "svg/window.svg"),
            array("title" => "Products",    "link" => "products", "icon" => "svg/stack.svg", 

                "sublinks" => array(
                                    array("title" => "All Products", "link" => "all-products"),
                                    array("title" => "Add new Product", "link" => "insert-product"),
                    )
            ),
            array("title" => "Orders",       "link" => "orders", "icon" => "svg/cat.svg"),
            array("title" => "Analysis",    "link" => "analysis", "icon" => "svg/time.svg"),
            array("title" => "Users",       "link" => "users", "icon" => "svg/people.svg")

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

 ?>