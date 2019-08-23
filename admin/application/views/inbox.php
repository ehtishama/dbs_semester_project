<?php 
	$this -> load -> view("templates/header");
	$this -> load -> view("templates/navbar");
 ?>

 <div class="body-wrapper flex mt-2">
 	<?php $this -> load -> view("templates/sidebar") ?>
 	<div class="w-full mx-2 ">
 		<div class="chat-container flex shadow-lg rounded">
 			<div class="chat-box w-full flex flex-col">
 				<div class="msgs bg-gray-200 flex-grow overflow-y-scroll" id="msg-box">
 					<?php foreach ($messages as $message): ?>
 						<?php if ($message['sender'] == 0): ?>
 							<div class="msg text-right">
		 						<p class="text p-3 px-6 bg-gray-400 mx-6 my-2 rounded-full inline-block">
		 							<?php echo $message['msg'] ?>
		 						</p>
		 					</div>
 					 	<?php else: ?>
 					 		<div class="msg">
		 						<p class="text p-3  px-6 bg-white mx-6 my-2 rounded-full shadow inline-block">
		 							<?php echo $message['msg'] ?>
		 						</p>
		 					</div>
		 				<?php endif; ?>			
 					<?php endforeach ?>
 					

 				</div>
 				<div class="msg-input" style="">
 					<input type="text" name="msg" placeholder="something..." class="block p-3 text-lg w-full bg-white border" id="send_message"
 					data-customer_id = "<?php echo $customer_id ?>"
 					>
 				</div>
 			</div>
 			
 			<div class="contact_list w-1/3 bg-white">
 				<ul class="customers">
 					
 					<?php foreach ($customers as $customer): ?>
 						<?php if($customer['id'] == $customer_id):  ?>
 							<a href="<?php echo base_url() . "inbox/user/". $customer['id'] ?>">
	 						<li class="customer p-2 pl-4 bg-gray-200 hover:bg-gray-200">
		 					 	<div class="customer-info flex items-center">
		 					 		<img src="<?php echo base_url()."/assets/avatar.jpeg" ?>" class="h-12 w-12 rounded-full">
		 					 		<div>
			 							<p class="name flex-grow ml-2 text-gray-700">
			 								<?php echo $customer['first_name'] . $customer['last_name'] ?>	
		 								</p>	
			 							<p class="name flex-grow ml-2 text-gray-600 text-xs">@<?php echo $customer['username'] ?></p>
		 							</div>
		 					 	</div>
		 					</li>
	 					</a>	
 						<?php else: ?>
 						<a href="<?php echo base_url() . "inbox/user/". $customer['id'] ?>">
	 						<li class="customer p-2 pl-4 hover:bg-gray-200">
		 					 	<div class="customer-info flex items-center">
		 					 		<img src="<?php echo base_url()."/assets/avatar.jpeg" ?>" class="h-12 w-12 rounded-full">
		 					 		<div>
			 							<p class="name flex-grow ml-2 text-gray-700">
			 								<?php echo $customer['first_name'] . $customer['last_name'] ?>	
		 								</p>	
			 							<p class="name flex-grow ml-2 text-gray-600 text-xs">@<?php echo $customer['username'] ?></p>
		 							</div>
		 					 	</div>
		 					</li>
	 					</a>	
	 				<?php endif; ?>
 					<?php endforeach ?>
 				</ul>
 			</div>
 		</div>
 	</div>
 </div>

<script type="text/javascript">
	window.base_url = "<?php echo base_url(); ?>"
	let msgBox = document.querySelector("#msg-box");
	msgBox.scrollTo(0, msgBox.scrollHeight)
	window.onload  = function()
	{
		let input = document.getElementById("send_message");
		input.addEventListener("keypress", (event) => {
		if(event.key == "Enter")
		{
			
			let receiver = event.target.dataset.customer_id;
			let msg = event.target.value
			if(receiver == 0)
				return;
			// append msg to the chat box
			let msgElement = `<div class="msg text-right">
		 						<p class="text p-3 px-6 bg-gray-400 mx-6 my-2 rounded-full inline-block">
		 							${msg}
		 						</p>
		 					</div>`;
			let d = document.createElement('div');
			d.innerHTML = msgElement;
		 	msgBox.appendChild(d);
		 	msgBox.scrollTo(0, msgBox.scrollHeight)
		 	event.target.value = ""

			sendMessage(msg, receiver);
		}

		})
	}

	function sendMessage(msg, receiver)
	{

		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function()
		{
			if(!(xhr.readyState == 4 && xhr.status == 200))
				return;
			/** TODO:
			*	check for the response if something goes wrong
			*	then inform user.
			*/

		}
		xhr.open("post", base_url + "inbox/send-message")
		params = "msg=" + msg + "&receiver=" + receiver
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.send(params)
		

	}
	
</script>

 <?php 
 	$this -> load -> view("templates/footer")
  ?>