<?php $this -> load -> view("templates/header") ?>
<?php $this -> load -> view("templates/navbar") ?>

<div class="mt-2 flex">
	<?php $this -> load -> view("templates/sidebar") ?>
	
	<div class="main-body bg-white mx-2 shadow border w-full">
		<div class="users m-8">
			<div class="flex mb-4">
				<h2 class="font-bold text-lg">Recently Registered</h2>
				<input type="text" name="search" placeholder="search users" class="ml-auto bg-gray-300 w-1/3 h-8 rounded px-2 border">
			</div>
		<table class="">
				<thead class="ronded-full bg-gray-400">
					<th>#</th>
					<th>User id</th>
					<th>username</th>
					<th>Email</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
				<?php 
					$count = 1;				
					foreach($users as $user): 
				?>
					<tr class="hover:bg-gray-300 rounded">
						<td class="">
							<?php echo $count++;  ?>
						</td>
						<td>
							<?php echo $user['id'] ?>		
						</td>
						
						
						<td class="font-bold">
							<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
							<span>
								@<?php echo $user['username']; ?>
							</span>
						</td>
						<td class=""><?php echo $user['email'] ?></td>
						<td>
							<button class="bg-blue-600 text-white p-1 rounded hover:bg-blue-500">
								send messsage
							</button>
						</td>
						<td class="font-bold text-yellow-600">
							Delete
						</td>
					</tr>
				<?php 
					endforeach; 
				?>
				</tbody>
				

			</table>
		</div>
		
	</div>
</div>


<?php $this -> load -> view("templates/footer") ?>