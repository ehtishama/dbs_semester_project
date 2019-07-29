<nav class="main_nav bg-white text-white p-4 flex sticky z-10-xl border">
			<div class="logo">
				<a href="<?php echo base_url(); ?>" class="text-gray-600 font-bold text-xl mx-16">Admin Panel</a>
			</div>
			<input type="serach" name="" class="border border-gray-300 bg-gray-300 rounded px-5 p-1 mx-5 flex-grow text-gray-700" placeholder="Search ">


			<a href="#" class="ml-auto relative self-center" >
				<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" 
				viewBox="0 0 24 24" aria-labelledby="bellIconTitle" 
				stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000" id="navigation-bell"> 
					<title id="bellIconTitle">Notification</title> 
					<path stroke-linejoin="round" d="M10.5,4.5 C12.1666667,4.5 13.8333333,4.5 15.5,4.5 C17.5,4.5 18.8333333,3.83333333 19.5,2.5 L19.5,18.5 C18.8333333,17.1666667 17.5,16.5 15.5,16.5 C13.8333333,16.5 12.1666667,16.5 10.5,16.5 L10.5,16.5 C7.1862915,16.5 4.5,13.8137085 4.5,10.5 L4.5,10.5 C4.5,7.1862915 7.1862915,4.5 10.5,4.5 Z" transform="rotate(90 12 10.5)"/> 
					<path d="M11,21 C12.1045695,21 13,20.1045695 13,19 C13,17.8954305 12.1045695,17 11,17" transform="rotate(90 12 19)"/> 
				</svg>
				<span class="counter">2</span>
				<div id="navigation-dropdown" class="notifications absolute p-2 bg-white w-64 rounded my-1 right-0 text-sm border">
					<ul>
						<li class="text-gray-700 p-2 border-b">
							<img src="assets/avatar.jpeg" class="rounded-full h-8 w-8 mr-2 inline">
							<span>New Registered user</span>
						</li>
						<li class="text-gray-700 p-2">
							<img src="assets/avatar.jpeg" class="rounded-full h-8 w-8 mr-2 inline">
							<span>Alex commented on post </span>
						</li>
					</ul>
				</div>
			</a>
			<a href="#" class="ml-2 block relative self-center">
				<svg id="message-icon" role="img" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" 
				aria-labelledby="envelopeAltIconTitle" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000">
				<title id="envelopeAltIconTitle">Messages</title>
					<rect width="20" height="14" x="2" y="5"/> 
					<path stroke-linecap="round" d="M2 5l10 9 10-9"/> 
				</svg>
				<span class="counter">10</span>

				<div id="message-dropdown" class="notifications absolute p-2 bg-white w-64 rounded my-1 right-0 text-sm border text-gray-500">
					<ul>
						<li class="hover:bg-gray-200">
							
							<div class="flex">
								<img src="./assets/avatar.jpeg" class="w-8 h-8 border shadow rounded-full self-center mx-2">
								<div class="w-full">
									<p class="username text-block text-gray-600">
										elliot
									</p>
									<p class="message">
										what is the price for something this....
									</p>
								</div>
							</div>		
						</li>
						<li class="mt-4 hover:bg-gray-200">
							
							<div class="flex">
								<img src="./assets/avatar.jpeg" class="w-8 h-8 border shadow rounded-full self-center mx-2">
								<div class="w-full">
									<p class="username text-block text-gray-600">
										ehtisham
									</p>
									<p class="message">
										What did you say?
									</p>
								</div>
							</div>		
						</li>

					</ul>
				</div>

			</a>
			<div class="profile ml-2 self-center">
				<img src="<?php echo base_url() ?>assets/avatar.jpeg" 
				class="inline w-8 h-8 border-2 shadow-lg rounded-full border-white">
				<span class="text-sm text-gray-600 font-bold">
					<a href="#" class="relative" id="username-chevron">
						<?php echo $this -> ion_auth -> user() -> row() -> username; ?>
						
						<svg  class="inline" role="img" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" aria-labelledby="chevronDownIconTitle" stroke="gray" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000"> 
							<title>Chevron Down</title> 
							<polyline points="6 10 12 16 18 10"/>
						</svg>
						<div id="user-dropdown" 
						class=" notifications absolute bg-white p-2 w-48 right-0  mx-2 my-1 border shadow-lg rounded">
							<ul>
								<li class="hover:bg-gray-100">
									<a href="http://localhost/ecom" class="p-2 block text-gray-500 hover:text-gray-600">
										visit site
									</a>
									<a href="<?php echo base_url() ?>logout" class="p-2 block text-gray-500 hover:text-gray-600">logout</a>
								</li>
								
								
							</ul>
						</div>
					</a>
				</span>
			</div>
		</nav>
