<div class="bg-white">
			<ul class="flex container mx-auto">
				<?php foreach ($data['categories'] as $categoryRow) { ?>
					<li>
						<a class="inline-block p-4 cursor-pointer hover:bg-gray-200 font-thin text-sm text-gray-700"
						 href="<?php echo APPROOT ?>/category/cat_id/<?php echo $categoryRow['category_id']   ?> "> 
							<?php echo $categoryRow['category']; ?>		
						</a>
					</li>
				<?php } ?>
				<!-- <li><a href="<?php echo APPROOT ?>/lab2">Lab Sessional 2</a></li> -->
				
			</ul>
</div>