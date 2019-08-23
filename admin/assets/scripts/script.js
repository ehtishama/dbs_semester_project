/* select element by id*/
function $_(id)
{
	return document.getElementById(id);
}

/* select element by class name*/
function $__(className)
{
	return document.getElementsByClassName(className);
}

/** 
*	toggleDisplay(element)
*	toggles the display property of an element
*		
*
*/

function toggleDisplay(element)
{
	if(!element)
		return;
	if (element.style.display == "none") 
	{
		if(currentlyVisible)
			currentlyVisible.style.display = "none";
		
		element.style.display = "block";
		currentlyVisible = element;

	}
	else element.style.display = "none";	
}


function clickDisplayToggle(action, target)
{
	if(action && target){
		action.addEventListener("click", function(){
			toggleDisplay(target)
		})
	}else console.log("wrong")
}

function hideElement(element)
{
	if(element)
		element.style.display = "none"
	else console.log("sorry")
}
function hideElements(elements)
{
	for (var i = elements.length - 1; i >= 0; i--) {
		if(elements[i])
			elements[i].style.display = "none"
	}
}


var chevron = $_("username-chevron");
var user_dropdown = $_("user-dropdown");

var navigation_bell = $_("navigation-bell");
var navigation_dropdown = $_("navigation-dropdown");

var msg_dropdown = $_("message-dropdown");
var msg_icon = $_("message-icon");



hideElement(user_dropdown)
hideElement(navigation_dropdown)
hideElement(msg_dropdown)

var currentlyVisible = null;

clickDisplayToggle(msg_icon, msg_dropdown)
clickDisplayToggle(chevron, user_dropdown)
clickDisplayToggle(navigation_bell, navigation_dropdown)

document.querySelectorAll('[data-action="toggle-display"]').forEach((element) => {
	let targetElement = $_(element.dataset.target);
	clickDisplayToggle(element, targetElement);
});



document.querySelectorAll('[data-action="edit"]').forEach((element) => {
	let targetElement = $_(element.dataset.target)
	element.addEventListener("click", (event) => {
		targetElement.style.backgroundColor = "rgba(255,244,74,.45)";
		targetElement.focus();
		element.innerText =  "Save";
	})

});

// tracks the current displayed modal so that it can be closed 
let active_modal = null			

function displayModal(modalId)
{
	let modal = document.getElementById(modalId)

	if(!modal)
		return;

	// disable body scrolling
	document.body.style.overflowY = "hidden";
	
	modal.classList.remove("modal_hide")
	modal.classList.add("modal_show")

	

	active_modal = modal
	console.log(modal.classList)
}


			
/**
*	initModalTriggers()
*	registers click listener on elements with [data-action = modal]
*	onclick, modal pointed by date-target is shown
*	sets the global variable active_modal to current shown modal
*/

function initModalTriggers()
{
	let modalTriggers = 
	document.querySelectorAll("[data-action='modal']");

	modalTriggers.forEach(t => {
		t.addEventListener("click", event => {
			event.preventDefault()
			let modalId = event.target.dataset.target
			displayModal(modalId)
		})
	})
}

/**
*	initModalClosers()
*	registers click listener on elements with [data-close = modal]
*	onclick, modal pointed by `active_modal` global variable is closed
*/
function initModalClosers()
{
	let modalClosers = 
	document.querySelectorAll("[data-close='modal']");	

	modalClosers.forEach( c => {
		c.addEventListener("click", event => {
			event.preventDefault()
			active_modal.classList.remove("modal_show")
			active_modal.classList.add("modal_hide")

			// enable scrollin on body
			document.body.style.overflowY = "scroll"
		})
	})
}

initModalTriggers();
initModalClosers();


















//  modals
var model_actions = $__("model-action");
var modal_crosses = $__("modal-cross");
if(model_actions)
{
	for (var i = model_actions.length - 1; i >= 0; i--) {
		if(model_actions[i])
		{
			model_actions[i].addEventListener("click", function(e){
				e.preventDefault();
				var btn = e.target;
				var modal = $_(btn.dataset.target)
				console.log(modal)
				toggleDisplay(modal)
			})
			
		}
	}
}

if(modal_crosses)
{
	for (var i = modal_crosses.length - 1; i >= 0; i--) {
		if(modal_crosses[i])
		{
			modal_crosses[i].addEventListener("click", function(e)
			{
				e.preventDefault();
				var modal = $_(e.target.dataset.target)
				toggleDisplay(modal)
			})
			
		}
	}
}


