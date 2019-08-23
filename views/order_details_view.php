<?php
    require_once("views/libs/header.php");
?>

<div class="flex container mx-auto">
    <?php require_once("views/templates/profile_sidebar.php");  ?>
    <div class="w-full">
        <div class="flex">
        	<!-- payment card -->
        	<div class="bg-white rounded shadow m-2 w-1/2">
        		<div class="head p-2 px-4 text-lg text-gray-700">
        			<h2 class="font-bold">Payment Details</h2>
        		</div>
        		<div class="body border-t text-gray-700">
                    <div class="content p-2 px-4 flex">
                        <ul>
                            <li class="py-1 text-gray-600">Order Id #</li>
                            <li class="py-1 text-gray-600">Amount</li>
                            <li class="py-1 text-gray-600">Trasnaction #</li>
                            
                        </ul>
                        <ul class="ml-auto text-black">
                            <li class="py-1"><?php echo $data['summary']['id'] ?></li>
                            <li class="py-1">$<?php echo $data['summary']['charges'] ?></li>
                            <li class="py-1">Paid</li>
                        </ul>
                    </div>
        			
        		</div>
        	</div>

            <!-- order summary -->
            <div class="bg-white rounded shadow m-2 w-1/2">
                <div class="head p-2 px-4 text-lg text-gray-700">
                    <h2 class="font-bold">Order Summary</h2>
                </div>
                <div class="body border-t text-gray-700">
                    <div class="content p-2 px-4 flex">
                        <!-- qty times product img
                        sub total shipping total discount -->
                        <ul class="text-gray-600">
                            <li class="w-64 my-2">
                                Sub Total
                            </li>
                            <li class="w-64 my-2">
                                Shipping Charges
                            </li>
                            <li class="w-64 my-2">
                                Processing Fee
                            </li>
                            <li class="w-64 my-2">
                                Grand Total
                            </li>
                        </ul>

                        <ul class="text-black ml-auto">
                            <li class="my-2">
                                $<?php echo $data['summary']['charges'] ?>
                            </li>
                            <li class="my-2">
                                $0.00
                            </li>
                            <li class="my-2">
                                $0.00
                            </li>
                            <li class="my-2">
                                $<?php echo $data['summary']['charges'] ?>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!-- Products Ordered -->
        <div class="bg-white rounded shadow m-2 mt-4">
            <div class="head p-2 px-4 text-lg text-gray-700">
                <h2 class="font-bold">Products Ordered</h2>
            </div>
            <div class="body border-t text-gray-700">
                <div class="content p-2 px-4">
                    <!-- product -->
                    <?php foreach($data['products'] as $product): ?>
                    <div class="flex items-center border-b p-4">
                        <p class="mr-4"> 
                            <span class="text-3xl text-gray-600">
                            <?php echo $product['quantity'] ?>
                            </span> x
                        </p>
                        <p class="w-64 mr-4"><?php echo $product['title'] ?></p>
                        <img 
                        src="<?php echo m_create_img_url($product['image']) ?>"
                         alt="Product Image" class="h-12 w-12 border border-gray-600 mr-8 rounded bg-white">
                        <p class="mr-4">$<span class="text-3xl text-thin"><?php echo $product['charges'] ?></span></p>
                        <p class="ml-auto">
                            <span class="text-blue-500 cursor-pointer">
                               <a href="<?php echo APPROOT . '/products/product/'. $product['id'] ?>"> View Details </a>
                            </span>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
 </div>
