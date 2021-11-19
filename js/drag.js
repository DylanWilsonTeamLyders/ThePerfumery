//When user starts dragging item
function onDragStart(event) {
	event.dataTransfer.setData("text/plain", event.target.id);
}
//This event handler will be attached to our dropzone element and fire when a dragover event occurs.
function onDragOver(event) {
	event.preventDefault();
}
// This event handler will also be attached to our dropzone element and fire when a drop event occurs.
function onDrop(event) {
	const id = event.dataTransfer.getData("text");
	const draggableElement = document.getElementById(id);
	const dropzone = event.target;
	if (dropzone.tagName == "DIV") {
		dropzone.appendChild(draggableElement);
		event.dataTransfer.clearData();
		dropzoneName = event.target.id;
		SendToServer(id, dropzoneName);
	} else {
		alert("Cannot stack items on top of one another.");
	}
}

let SendToServer = function (MyInput, MyArea) {
	//Start of jQuery ajax call.
	$.ajax({
		//Defines type of ajax call.
		type: "POST",
		//Sets data type to text.
		dataType: "text",
		//Sets key value pairs for inputs (to be used in php).
		data: { perfumeName: MyInput, areaName: MyArea },
		//Set url of the php to execute
		url: "/php/ajax.php",
		success(Response) {
			// If the response was successful we will get the output in this callback.
			console.log("Success Response === ", Response);
		},
		error(jqXHR, textStatus, error) {
			// If the response was NOT successful we will get the error in this callback
			console.log("Error Response === ", error);
		},
	});
};
