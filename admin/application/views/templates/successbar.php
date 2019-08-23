
<?php if (isset($_SESSION['success'])): ?>
<div class="success p-4 bg-green-200 text-green-500 text-center rounded mb-8 ">
	<p>
		<?php echo $this->session->flashdata('success') ?>
	</p>	
</div>
<?php endif ?>

<?php if (isset($_SESSION['error'])): ?>
<div class="success p-4 bg-red-200 text-red-500 text-center rounded  mb-8">
	<p>
		<?php echo $this->session->flashdata('error') ?>
	</p>	
</div>
<?php endif ?>