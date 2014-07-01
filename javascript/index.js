$(document).ready(function(){
	$('.add-btn').click(function(){
		//alert('Click');
		addTask();
	});
});

function addTask()
{
	var taskText = $('.add-item').val();
	$.ajax({
		url:'http://localhost/tasklist/index.php/welcome/addtask',
		data:{'content':taskText},
		type:'POST',
		success:function(data){
			alert(data);
			//$(section .active ul).append('<li><input type="checkbox"></li>');
		},
		error:function(x,y,z)
		{
			alert('Error');
		}
	});
}

function removeAll()
{
	$.ajax({
		url:'localhost/taskslist/removeall',
		type:'POST',
		success:function(data){
			alert(data);
			//$(section .inactive ul).empty();
		},
		error:function(x,y,z)
		{
			alert('Error');
		}
	});
}