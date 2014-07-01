$(document).ready(function(){

});

function addTask(){
	$(section .active ul).append('<li><input type="checkbox"></li>');
}

function completeTask(){
	$(section .active ul li).remove();
}

function clearTasks(){
	$(section .inactive ul).empty();
}