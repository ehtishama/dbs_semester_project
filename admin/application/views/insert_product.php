<?php
    // include header and navigation
    $this -> load -> view("templates/header");
    $this -> load -> view("templates/navbar");
?>

<?php if(isset($success)): ?>
 <div class="alert bg-green-400 p-2 m-2 w-auto shadow">
     <p class="text-white text-bold text-center p-2"><?php echo $success ?></p>
 </div>
<?php endif; ?>

<?php if(isset($is_error)): ?>
<div class="alert bg-red-400 p-2 pl-8 m-2 w-auto shadow"> 
    <?php echo validation_errors('<p class="ml-8 p-2">', '</p>'); ?>
    
    <?php if(isset($error)) ?>
        <?php echo $error; ?>
 
 </div>
<?php endif; ?>




<div class="mt-2 flex">
    <!-- sidebar -->
    <?php $this -> load -> view("templates/sidebar"); ?>
    
    <?php echo form_open_multipart("insert-product", array("id" => "product_form", "class" => "flex w-full")); ?>
        <!-- editor -->
        <div class="editor-wrapper w-full mx-2 overflow-hidden shadow">
            <div class="form-group bg-white p-2 mb-2 shadow border">
                <label class="font-bold mb-2">Title</label>
            <input type="text" name="title" placeholder="Macbook Air 2019" 
                value="<?php echo set_value("title"); ?>" 
                class="border rounded shadow p-2 px-4 my-2 w-full bg-white" required>    
            </div>
            

            <div id="editor" class="bg-white w-full">

            </div>
        </div>

        <div class="right-sidebar w-1/3 mr-2 bg-white p-4 shadow border">
            <div class="form-group mb-4">
                <label class="font-bold">Price</label>
                <input type="price" name="price" placeholder="$00.00" 
                value="<?php echo set_value("price") ?>" 
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
                value="<?php echo set_value("tags") ?>" 
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
            rounded shadow" id="post_button">Post</button>
        </div>

        <input type="hidden" name="desc" value="<?php echo set_value("desc"); ?>" id="description_field">
        <input type="hidden" name="product_submit" value="1">
    </form>

</div>


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
        console.log(description_field.value);
        
        productForm.submit();
    
    })


    
        
    
    
  }
</script>

<?php 
$this -> load -> view("templates/footer");
?>