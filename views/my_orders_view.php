
<?php
    require_once("views/libs/header.php");
?>
<div class="container mx-auto">
<div class="profile_page_container">
    <?php require_once("views/templates/profile_sidebar.php");  ?>

        <div class="w-full mr-2">
        <?php foreach ($data['orders'] as $order): ?>
        	<div class="bg-white p-4 my-2 border shadow cursor-pointer hover:bg-gray-100">
        		<p class="border-b text-gray-600 text-thin">
        			Order Id # 
        			<span class="text-blue-500">
        			<?php echo $order['id'] ?> 
        			</span>
        		</p>
        		<div class="flex justify-start items-baseline text-xl text-gray-700 my-3">
        			<p class="text-2xl mr-8"><span>$</span><?php echo $order['charges'] ?></p>
        			<p class="mr-8"><?php echo $order['created_at'] ?></p>
        			<p>
        				<span class="bg-gray-500 rounded inline-block px-3 text-white capitalize shadow">
        					<?php echo $order['status'] ?>
        				</span>
        			</p>
        			<p class="ml-auto text-blue-600 font-thin">
        				<a href="<?php echo APPROOT . '/profile/order_details/' . $order['id']; ?>">
        					Details
        				</a>
        			</p>
        		</div>
        	</div>
        <?php endforeach; ?>

        <?php if(count($data['orders']) == 0 ): ?>
        <div class="w-2/3 mx-auto text-2xl mt-16">
            <p class="text-gray-700">You have not purchased anything 
	            <a href="<?php echo APPROOT ?>"
	            	class="border-blue-500 p-2 px-3 border-2 text-blue-500 rounded mx-3
	            	hover:bg-blue-500 hover:text-white shadow hover:shadow-lg "
	            	>
	            	 Do Some Shopping Now
	            </a>
            </p>
        </div>
    	<?php endif; ?>
    </div>
</div>
</div>

    
