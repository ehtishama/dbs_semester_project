<?php 

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



<div class="body-wrapper mt-2 flex">
	<?php $this -> load -> view("templates/sidebar"); ?>

	<div class="main-content  w-full">
		<?php $this -> load -> view("templates/product_form"); ?>
	</div>
</div>


<?php $this -> load -> view("templates/footer"); ?>