<?php
    require_once("views/libs/header.php");
?>

<div class="flex container mx-auto">
    <?php require_once("views/templates/profile_sidebar.php");  ?>
    <div class="my-2 w-full border shadow-lg">
    	<!-- msgs conatianer -->
    	<div class="" style="height: calc(100vh - 200px)">
			<div class="flex-grow overflow-y-scroll h-full px-3" id="msg-box">
					<?php foreach($data['messages'] as $message): ?>
						
						<?php if($message['sender'] == 0): ?>
						<div class="msg">
							<p class="text p-3 px-6 bg-white shadow-lg mx-6 my-2 rounded-full inline-block">
								<?php echo $message['msg'] ?>
							</p>
						</div>
						<?php else: ?>
						<div class="msg text-right">
							<p class="text p-3 px-6 bg-gray-400 mx-6 my-2 rounded-full inline-block">
								<?php echo $message['msg'] ?>
							</p>
						</div>
						<?php endif; ?>

					<?php endforeach; ?>
				 	
				 		
			</div>
    	</div>

    	<!-- send button -->
    	<div class="flex py-4">
	    	<input type="text" name="send_message" placeholder="type something and hit enter to send..." 
	    	class="inline-block w-full text-lg mr-2 pl-6 shadow-xl rounded-full">
	    	<button class="bg-blue-500 text-white font-bold p-2 px-4 rounded-full mr-4 shadow-xl">Send</button>
    	</div>
    </div>
</div>    
<script type="text/javascript">
	window.base_url = "<?php echo APPROOT; ?>"
	let msgBox = document.querySelector("#msg-box");
	msgBox.scrollTo(0, msgBox.scrollHeight)
	window.onload  = function()
	{
		let input = document.querySelector("input[name='send_message']");
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
			{
				console.log(xhr.response)
			}
			/** TODO:
			*	check for the response if something goes wrong
			*	then inform user.
			*/

		}
		xhr.open("post", base_url + "/profile/send_message")
		params = "msg=" + msg
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
		xhr.send(params)
		

	}




</script>
<?php
    require_once("views/libs/footer.php");
?>