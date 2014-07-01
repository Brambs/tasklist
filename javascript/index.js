$(document).ready(function(){
	loadActive();
	loadInactive();

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
			//alert(data);
			//$(section .active ul).append('<li><input type="checkbox"></li>');
			loadActive();
			$('.add-item').val('');
		},
		error:function(x,y,z)
		{
			alert('Error');
		}
	});
}

function loadActive()
{
	$.ajax(
		{
			url:'http://localhost/tasklist/index.php/welcome/active',
			type:'POST',
			success:function(data)
			{
				var jdata = $.parseJSON(data);
				$('#active-list').empty();
				for(x = 0; x < jdata.length; x++)
				{
					$('#active-list').append('<li><input type="checkbox" class="checkbox" value="' + jdata[x].id + '">' + jdata[x].content + '</li>');
				}
				controlBinding();
			},
			error:function(x,y,z)
			{
				alert('Error en coleccion');
			}
		});
}

function loadInactive()
{
	$.ajax(
		{
			url:'http://localhost/tasklist/index.php/welcome/inactive',
			type:'POST',
			success:function(data)
			{
				var jdata = $.parseJSON(data);
				$('#inactive-list').empty();
				for(x = 0; x < jdata.length; x++)
				{
					$('#inactive-list').append('<li><input type="checkbox">' + jdata[x].content + '</li>');
				}
				controlBinding();
			},
			error:function(x,y,z)
			{
				alert('Error en coleccion');
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


function controlBinding()
{
	 $("input[type=checkbox]").click(function() {
        if(this.checked){
        	var idTask=this.value;
        	$.ajax({
        		url:'http://localhost/tasklist/index.php/welcome/setinactive',
        		data:{'id':idTask},
        		type:'POST',
        		success:function(data)
        		{
        			loadActive();
        			loadInactive();
        		},
        		error:function(x,y,z)
        		{
        			alert('Error inactivo');
        		}
        	});
        	//alert(this.value);
        }
    });
}