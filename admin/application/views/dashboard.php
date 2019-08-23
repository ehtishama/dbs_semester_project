	
		<!-- header -->
		<?php $this -> load -> view("templates/header.php");?>

		<!-- navigation bar -->
		<?php $this -> load -> view("templates/navbar.php");?>

		<div class="wrapper flex mx-auto m-2">
			<!-- sidebar -->	
			<?php $this -> load -> view("templates/sidebar.php");?>
			<section class="w-full"> 
				<div class="main_content ">
					<div class="highlights flex flex-wrap p-8"> <!-- highlights -->
						<h2 class="font-bold w-full p-1 text-gray-700">Monthly highlights</h1>
						<div class="highlight bg-gray-100 p-8 shadow mx-1 flex-grow   rounded-lg">
							<h4 class="text-sm text-gray-500">sales</h4>
							<p class="text-3xl font-400 text-gray-700"><span class="text-sm">$</span><?php echo $highlights['sales'] ?></p>

						</div>

						<div class="highlight bg-gray-100 p-8 shadow mx-1 flex-grow  rounded-lg">
							<h4 class=" text-sm text-gray-500">orders</h4>
							<p class="text-3xl font-400 text-gray-700"><?php echo $highlights['orders'] ?></p>

						</div>

						<div class="highlight bg-gray-100 p-8 shadow mx-1 flex-grow  rounded-lg">
							<h4 class=" text-sm text-gray-500">customers</h4>
							<p class="text-3xl font-400 text-gray-700"><?php echo $highlights['customers'] ?></p>

						</div>

						<div class="highlight bg-gray-100 p-8 shadow mx-1 flex-grow  rounded-lg">
							<h4 class=" text-sm text-gray-500">hits</h4>
							<p class="text-3xl font-400 text-gray-700">4,017</p>

						</div>
					</div> <!-- highlights end -->


					<div class="monthly_stats p-8 m-2"> <!-- monthly stats -->
						<h2 class="font-bold w-full p-1 text-gray-700">Statistics</h1>
						<canvas class="block w-full bg-gray-100 rounded shadow p-8" id="stats">
							
						</canvas> <!-- monthly stats end -->
					</div>

					<div class="flex m-2 flex-wrap p-8">
						<div class="recent_orders mr-2 flex-grow " > <!-- recent orders -->
							<h2 class="font-bold w-full p-1 text-gray-700">Recent Orders</h1>

							<table class="bg-gray-100 rounded shadow p-2">
								<thead class="bg-gray-400">
									<th>#</th>
									<th>Id</th>
									<th>Customer</th>
									<th>Bill</th>
									<th>Payment</th>
									<th>Delivery</th>
								</thead>

							<?php
								$count = 1;
								foreach ($highlights['recent_orders'] as $order): ?> 
								<tr class="">
									<td><?php echo $count++; ?></td>
									<td>$<?php echo $order['id'] ?></td>
									
									<td class="font-bold w-full">
										<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
										<?php echo $order['first_name'] ?>
									</td>
									<td>$<?php echo $order['charges'] ?></td>
									<td></td>
									<td><?php echo $order['status'] ?></td>
									
								</tr>
							<?php endforeach; ?>
							</table>
						</div>	<!-- recent orders end -->
						

						<div class="recent_orders w-1/2">
							<h2 class="font-bold w-full p-1 text-gray-700">Top Selling Products</h1>

							<table class="p-8 rounded shadow border bg-gray-100">
								<thead class="ronded-full bg-gray-400">
									<th>#</th>
									<th>Id</th>
									<th>Name</th>
									<th>Price</th>
									<th>Stock</th>
									
								</thead>
								<?php
								$count = 1;
								 foreach ($highlights['top_products'] as $product): ?>
								<tr class="">
									<td><?php echo $count ++; ?></td>
									<td><?php echo $product['id'] ?></td>
									
									<td class="font-bold w-full">
										<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
										<?php echo $product['title'] ?>
									</td>
									<td>$<?php echo $product['price'] ?></td>
									<td></td>
								</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>

					<div class="flex">
						<div class="recent-activity  p-8 mx-2  text-sm text-gray-600 w-auto">
							<h2 class="text-lg font-bold text-gray-700 mb-4">Recent Activity</h2>
							<ul class="bg-gray-100 p-4 shadow" >
								<?php foreach ($highlights['recent_activities'] as $activity): ?>
									<li class="hover:bg-gray-300">
									<p class="p-2 mt-2">
										<?php echo $activity['activity']; ?>
									</p>
								</li>	
								<?php endforeach ?>
								
								
								
							</ul>


						</div>
						
					</div>
				</div>
			</section>
		</div>

		<!-- char.js -->
		<script type="text/javascript">
			window.onload = function(){

				// get weekly sales data
				var xhr = new XMLHttpRequest();
				xhr.addEventListener("load", function(response){
					if(xhr.status != 200)
						return;

					let data = JSON.parse(xhr.response);
					initBarChart(data);
				});
				xhr.open("GET", "dashboard/getWeekSalesJson");
				xhr.send();    
			}


			function initBarChart(values)
			{
				let m_labels = []
				let m_data = []
				for(var key in values)
				{
					m_labels.push(key)
					m_data.push(values[key])
				}
				
				var ctx = document.getElementById('stats').getContext('2d');
				var myChart = new Chart(ctx, {
			        type: 'bar',
			        data: {
			            labels: m_labels,
			            datasets: [{
			                label: '# of Sales',
			                data: m_data,
			                backgroundColor: [
			                    'rgba(255, 99, 132, 0.2)',
			                    'rgba(54, 162, 235, 0.2)',
			                    'rgba(255, 206, 86, 0.2)',
			                    'rgba(75, 192, 192, 0.2)',
			                    'rgba(153, 102, 255, 0.2)',
			                    'rgba(255, 159, 64, 0.2)'
			                ],
			                borderColor: [
			                    'rgba(255, 99, 132, 1)',
			                    'rgba(54, 162, 235, 1)',
			                    'rgba(255, 206, 86, 1)',
			                    'rgba(75, 192, 192, 1)',
			                    'rgba(153, 102, 255, 1)',
			                    'rgba(255, 159, 64, 1)'
			                ],
			                borderWidth: 1
			            }

			            ]
			        },
			        options: {
			            scales: {
			                yAxes: [{
			                    ticks: {
			                        beginAtZero: true
			                    }
			                }]
			            }
			        }
			    });
			}	
		</script>

		<!-- footer -->
		<?php $this -> load -> view("templates/footer.php");?>