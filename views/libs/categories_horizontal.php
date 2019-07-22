<div class="header_lower">
			<ul>
				<?php foreach ($data['categories'] as $categoryRow) { ?>
					<li>
						<a href="<?php echo APPROOT ?>/category/cat_id/<?php echo $categoryRow['id']   ?> "> 
							<?php echo $categoryRow['category']; ?>		
						</a>
					</li>
				<?php } ?>
				<li><a href="<?php echo APPROOT ?>/lab2">Lab Sessional 2</a></li>
				
			</ul>
</div>