<?php
class Products extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent:: __construct();

        $this -> load -> helper('general_helper');
        validate();

        $this -> load -> helper('form');
        $this -> load -> model("Product");

        $this -> data['sidebar_links'] = sidebar_links();



        $this -> data['title'] = 'Product';
        
    }

    private function helper()
    {
        if($this -> input -> post("product_submit")):
        

            // form validation
            $this -> load -> library("form_validation");

            $this -> form_validation -> set_rules("title", "Product Title", "required");
            $this -> form_validation -> set_rules("price", "Product Price", "required");
            $this -> form_validation -> set_rules("category", "Product Category", "required");
            $this -> form_validation -> set_rules("tags", "Tag", "required");
            

            if($this -> form_validation -> run() == FALSE)
            {
                $this -> data['is_error'] = true;
                // $this -> load -> view("insert_product", $this -> data);
                return false;
            }



            /*************************************
                        Picture Upload 
            **************************************/         

            
            
            // path calculation
            // ***********************************
            $username = $this -> ion_auth -> user() -> row() -> username;
            
            $month = date('m');
            $year  = date('y');
            $day   = date('d');

            $upload_path = "uploads/$username/$year/$month/$day";
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            // config for the picture
            // ***********************************
            $config['upload_path']          = $upload_path;

            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 500;

            $config['max_width']            = 1024  * 4;
            $config['max_height']           = 768   * 4;

            // sanitize file name
            // ***********************************
            $filename = $_FILES['image']['name'];
            $new_filename = m_sanitize_filename($filename); // defined in general_helper
            $config['file_name'] = $new_filename;
            

            // upload library with configurations
            //***********************************
            $this -> load -> library('upload', $config);


            // upload file
            //***********************************
            if(! $this -> upload -> do_upload('image'))
            {
                $this -> data['is_error'] = true;
                $this -> data['error'] = $this -> upload -> display_errors();
                // $this -> load -> view("insert_product", $this -> data);
                return false;
            }
            $full_path = $this -> upload -> data("full_path");


            // generate thumbnails
            // file uploaded, generate thumbnails now
            $this -> load -> library("image_lib");
            $thumb_config = array(
                'image_library'     => 'gd2',
                'source_image'      =>  $full_path,
                'create_thumb'      => true,
                'maintain_ratio'    => true,
                'width'             => 400,
                'height'            => 400
            );

            $this -> image_lib -> initialize($thumb_config);
            $this -> image_lib -> resize(); // will resize and store file at same location

            // sanitize  product description
            $this -> load -> helper("htmlpurifier");
            $product_desc = $this -> input -> post('desc');

            $clean_desc = html_purify($product_desc);
            

            // product properties
            $title      = $this -> input -> post("title");
            $price      = $this -> input -> post("price");
            $category   = $this -> input -> post("category");
            $tags       = $this -> input -> post("tags");
            $image      = $upload_path . "/" . $new_filename;

            
            $this -> Product -> init($title, $clean_desc, $price, $category, $tags, $image);
            return true;

        else:
            return false;            
        endif;        
    }

    public function index()
    {
        echo "These are products";
    }

    public function insert()
    {
        $this -> data['title'] = "Insert New Product";
        $this -> data['sidebar_links'] = sidebar_links();

        // WTF this does?
        if($this -> helper()){
            
            // load model and store data
            
            if(! $this -> Product -> insert_product())
            {
                $this -> data['error'] = "Could not insert product to the database <br> " 
                                . $this -> db -> error();
            }else $this -> data['success'] = "Product successfully posted";

        }

        
        $this -> load -> view("insert_product", $this -> data);
    }

    public function view_all_products()
    {
        $this -> load -> model("Product");
        $this -> data['products'] = $this -> Product -> get_all();

        $this -> load -> view("all_products.php", $this -> data);

        // print_r($data['products']);
    }

    public function edit_product($id)
    {
        if($this -> helper())
        {
            if(! $this -> Product -> update($id))
            {
                $this -> data['is_error']   =   true;
                $this -> data['error']      =   "Could not update product." . 
                                                $this -> db -> error();
            }
            else $this -> data['success'] = "Updated successfully";

        }


        // get data for current product
        $this  -> db    -> select("*")
                        -> from("products")
                        -> where("id", $id);
        $query = $this -> db -> get();                        
        
        // give that data to view
        $product = $query -> result_array();
        $product = $product[0];

        $this -> data['action']  = "update-product/$id";
        $this -> data['btn_title']  = 'Update Product';

        $this -> data['title']   = $product['title'];
        $this -> data['desc']    = htmlspecialchars($product['description']);
        $this -> data['price']   = $product['price'];
        $this -> data['tags']    = $product['tags'];


        $this -> load -> view("update_product", $this -> data);
    }



}