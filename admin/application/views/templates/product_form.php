<?php 
	


/*
	******************************************************************
	*
	* 	Product Form View
	*	This form assumes that
	*	--- form helper is loaded
	*	
	*	while loading this form you must provide
	*	--- action 
	*	--- title, desc, price, tags (could be empty)
	*	--- btn_title
	*	in data array as key => valye
	*
	*
	*******************************************************************
*/
	



 ?>


<?php 
	echo 
	form_open_multipart(
		$action, 
		array("id" => "product_form", "class" => "flex w-full")
	);
?>
    <!-- editor -->
    <div class="editor-wrapper w-full mx-2 overflow-hidden shadow">
        <div class="form-group bg-white p-2 mb-2 shadow border">
            <label class="font-bold mb-2">Title</label>
        	<input type="text" name="title" placeholder="Macbook Air 2019" 
            value="<?php echo $title ?>" 
            class="border rounded shadow p-2 px-4 my-2 w-full bg-white" required>    
        </div>
        

        <div id="editor" class="bg-white w-full">

        </div>
    </div>

    <div class="right-sidebar w-1/3 mr-2 bg-white p-4 shadow border">
        <div class="form-group mb-4">
            <label class="font-bold">Price</label>
            <input type="price" name="price" placeholder="$00.00" 
            value="<?php echo $price ?>" 
            class="w-full p-2 mt-2 bg-gray-300 border shadow" required>
        </div>

        <div class="form-group mb-4">
            <label class="font-bold">Category</label>
            <select name="category" class="w-full p-2 mt-2 border shadow rounded bg-gray-300">
                <option value="accessories">Accessories</option>
                <option value="cellphones">Cell Phones</option>
            </select>
        </div>

        <div class="form-group mb-4">
            <label class="font-bold">Tags</label>
            <input type="text" name="tags" placeholder="apple, macbook, 2019" 
            value="<?php echo $tags ?>" 
            class="w-full p-2 mt-2 bg-gray-300 border shadow" required>
        </div>

        <div class="fom-group mb-4">
            <label class="font-bold">Featured Image</label>
            <div class="w-full h-64 bg-gray-300 border shadow mt-2 p-2">
                <input type="file" name="image" 
                value="<?php echo set_value("image") ?>" 
                >
            </div>
        </div>

        <button class="mt-2 block bg-blue-600 hover:bg-blue-400 text-white font-bold p-4 w-full 
        rounded shadow" id="post_button"><?php echo $btn_title; ?></button>
    </div>

    <input type="hidden" name="desc" value="<?php echo ($desc); ?>"
     id="description_field">

    <input type="hidden" name="product_submit" value="1">
</form>



<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });



  window.onload = function()
  {



    var productForm = document.getElementById("product_form");
    var descriptionField = document.getElementById("description_field");

    // quill.setText(descriptionField.value);
    productForm.getElementsByClassName("ql-editor")[0].innerHTML = descriptionField.value;
    


    productForm.addEventListener("submit", function(e){
        e.preventDefault();
        var productHtml = productForm.getElementsByClassName("ql-editor")[0].innerHTML;
        description_field.value = productHtml;
        
        productForm.submit();
    
    })


    
        
    
    
  }
</script>