<?php 

	/**
	 * Controller class
	 */
	class Categories_controller extends CI_Controller
	{
		private $data;

		function __construct()
		{
			parent:: __construct();

			validate();

			$this -> load -> helper("form");
			$this -> load -> library("session");

			$this -> data['sidebar_links'] = sidebar_links();
			$this -> data['title'] = "Product Categories > Admin Panel";
		}

		public function index()
		{

			$this -> db -> select("l.category_id, l.category, r.category AS parent_category")
				-> from ("product_categories AS l")
				-> join ("product_categories AS r", "l.parent_category = r.category_id", "LEFT")
				-> order_by("category_id", "desc")
				;

			$this -> data['categories'] =
			$this -> db -> get() -> result_array();

			$this -> load -> view("product_categories", $this -> data);
		}

		public function insert()
		{
			if($this -> input -> post("insert-category")):

				$cat_name = $this -> input -> post("cat-name");
				$cat_parent  = $this -> input -> post ("cat-parent");

				$row = array("category" => $cat_name, "parent_category" => $cat_parent);
				
				if($this -> db -> insert("product_categories", $row))
				{
					$this->session->set_flashdata('success', 'Category successfully insertd.');
				}else $this->session->set_flashdata('error', 'Could not insert category.');

			endif;
			redirect("product-categories");
		}

		public function update()
		{
			if($this -> input -> post("update-category")):
				
				$cat_id = $this -> input -> post("cat-id");
				$cat_name = $this -> input -> post("cat-name");

				

				$row = array("category" => $cat_name);

				$this -> db -> set($row)
							-> where("category_id = $cat_id");

				if($this -> db -> update("product_categories"))
					$this->session->set_flashdata('success', 'Category updated successfully');
				else $this->session->set_flashdata('error', 'Could not update category');
				
			endif;
			redirect("product-categories");
			
		}

		public function remove($id)
		{
			if($this->db->delete('product_categories', array('category_id' => $id)))
				$this->session->set_flashdata('success', 'Category deleted.');
			else $this->session->set_flashdata('error', 'Could not delete category.');

			redirect("product-categories");
		}

	}




 ?>