		<!-- header -->
		<?php $this -> load -> view("templates/header.php");?>

		<!-- navigation bar -->
		<?php $this -> load -> view("templates/navbar.php");?>

		<div class="inner-body flex mx-auto m-2">
			<!-- sidebar -->	
			<?php $this -> load -> view("templates/sidebar.php");?>

			<section class="w-full">
				<div class="main_content ">
					<div class="highlights flex flex-wrap mx-2 bg-white p-10 border shadow">
						<h2 class="font-bold w-full p-1 text-gray-700">Highlights</h1>
						<div class="highlight bg-gray-700 p-5 mx-1 flex-grow   rounded-lg">
							<h4 class="text-sm">sales today</h4>
							<p class="text-3xl font-400"><span class="text-sm">$</span>1,200</p>

						</div>

						<div class="highlight bg-gray-700 p-5 mx-1 flex-grow  rounded-lg">
							<h4 class=" text-sm">Orders Today</h4>
							<p class="text-3xl font-400">23</p>

						</div>

						<div class="highlight bg-gray-700 p-5 mx-1 flex-grow  rounded-lg">
							<h4 class=" text-sm">New Customers</h4>
							<p class="text-3xl font-400">9</p>

						</div>

						<div class="highlight bg-gray-700 p-5 mx-1 flex-grow  rounded-lg">
							<h4 class=" text-sm">Hits</h4>
							<p class="text-3xl font-400">4017</p>

						</div>


					</div>


					<div class="monthly_stats bg-white p-10  m-2 border shadow">
						<h2 class="font-bold w-full p-1 text-gray-700">Statistics</h1>
						<canvas class="block w-full bg-white" id="stats">
							
						</canvas>
					</div>

					<div class="flex m-2 flex-wrap">
						<div class="recent_orders bg-white p-10 mr-2 border rounded shadow flex-grow " >
							<h2 class="font-bold w-full p-1 text-gray-700">Recent Orders</h1>

							<table class="">
								<thead class="ronded-full bg-gray-400">
									<th>#</th>
									<th>Id</th>
									<th>Customer</th>
									<th>Bill</th>
									<th>Payment</th>
									<th>Delivery</th>
								</thead>

								<tr class="">
									<td>1</td>
									<td>ORD-123</td>
									
									<td class="font-bold w-full">
										<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
										Ehtisham
									</td>
									<td>$100</td>
									<td>Paid</td>
									<td>Pending</td>
									
								</tr>

							</table>
						</div>
						

						<div class="recent_orders bg-white p-10  border border-gray-200 w-1/2 border-gray-400 rounded shadow">
							<h2 class="font-bold w-full p-1 text-gray-700">Top Selling Products</h1>

							<table class="">
								<thead class="ronded-full bg-gray-400">
									<th>#</th>
									<th>Id</th>
									<th>Name</th>
									<th>Price</th>
									<th>Stock</th>
									
								</thead>

								<tr class="">
									<td>1</td>
									<td>123</td>
									
									<td class="font-bold w-full">
										<img src="assets/avatar.jpeg" class="inline rounded h-10 w-10 mr-4">
										Keyboard
									</td>
									<td>$100</td>
									<td>29</td>
									
									
								</tr>

							</table>
						</div>
					</div>

					<div class="flex">
						<div class="recent-activity bg-white p-8 border rounded mx-2 shadow text-sm text-gray-600 w-auto">
							<h2 class="text-lg font-bold text-gray-700 mb-4">Recent Activity</h2>
							<ul>
								<li>
									<p class="p-2 mt-2 shadow rounded border"> <span class="font-bold">someone</span>  did something that you may want to look.</p>
								</li>
								<li>
									<p class="p-2 mt-2 shadow rounded border"> <span class="font-bold">someone</span>  did something that you may want to look.</p>
								</li>
								
							</ul>


						</div>
						
					</div>
				</div>


			</section>
		</div>

		<!-- char.js -->
		<script type="text/javascript">
			window.onload = function(){
			    var ctx = document.getElementById('stats').getContext('2d');
			    var myChart = new Chart(ctx, {
			        type: 'bar',
			        data: {
			            labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
			            datasets: [{
			                label: '# of Sales',
			                data: [12, 19, 3, 5, 2, 30],
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
			            },
			            {
			                label: 'Revenue',
			                data: [120, 192, 32, 52, 22, 130],
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