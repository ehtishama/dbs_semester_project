function $_(id)
{
	return document.getElementById(id);
}

function $__(className)
{
	return document.getElementsByClassName(className);
}

function toggleDisplay(element)
{
	if(element){
		if (element.style.display == "none") 
		{
			if(currentlyVisible)
				currentlyVisible.style.display = "none";
			
			element.style.display = "block";
			currentlyVisible = element;

		}
		else element.style.display = "none";	
	}else console.log("no element provided");
	
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


