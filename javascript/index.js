$(document).ready(function(){
	
});

function removeall
{
	$.ajax({
		url:'localhost/taskslist/removeall',
		type:'POST',
		success:function(){
			alert('OK');
		},
		error:funtion(x,y,z)
		{
			alert('Error');
		}
	});
}