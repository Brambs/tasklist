$(document).ready(function(){
	loadActive();
	loadInactive();

	$('.add-btn').click(function(){
		
		addTask();
	});
	
	$('.clear').click(function(){
		removeAll();
	});

	$('.add-item').keyup(function(e){
		if(e.keyCode==13)
		{
			addTask();
		}
	});

	$('.notification').hide();

});

function addTask()
{
	var taskText = $('.add-item').val();
	if(taskText.length>0 && taskText.length<500)
	{
		$.ajax({
		url:'http://localhost/tasklist/index.php/welcome/addtask',
		data:{'content':taskText},
		type:'POST',
		success:function(data){
			
			loadActive();
			$('.add-item').val('');
		},
		error:function(x,y,z)
		{
			notify('Error when creating task');
		}
	});
	}
	else
	{
		notify('Empty Fields not allowed!');
	}
	
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
					$('#active-list').append('<li><input type="checkbox" class="checkbox" value="' + jdata[x].id + '"><label>'+ jdata[x].content +'</label><input type="hidden" value="' + jdata[x].content + '" class="edit" taskid="'+jdata[x].id+'"></li>');
				}
				controlBinding();
			},
			error:function(x,y,z)
			{
				notify('Error when loading active tasks');
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
				if(jdata.length > 0)
				{
					$('.inactive').show();
					for(x = 0; x < jdata.length; x++)
					{

						$('#inactive-list').append('<li><input type="checkbox" checked="true" value="'+jdata[x].id+'">' + jdata[x].content + '</li>');
					}
				}
				else
				{
					$('.inactive').hide();
				}
				controlBinding();
			},
			error:function(x,y,z)
			{
				notify('Error when loading inactive tasks');
			}
		});
}

function removeAll()
{
	$.ajax({
		url:'http://localhost/tasklist/index.php/welcome/removeall',
		type:'POST',
		success:function(data){
			loadInactive();
		},
		error:function(x,y,z)
		{
			notify('Error when trying to delete inactive tasks');
		}
	});
}

function updatedContent(id,content)
{
	if(content.length>0 && content.length<500 && content!='')
	{
		$.ajax({
		url:'http://localhost/tasklist/index.php/welcome/updatecontent',
		type:'POST',
		data:{'id': id, 'content':content},
		success:function(data){
			loadActive();
		},
		error:function(x,y,z){
			notify('Error when updating content');
		}
	});
	}
	else
	{
		notify('Field Characters incorrect');
	}
	
}

function controlBinding()
{
	$('li').on('click', function(){
		$(this).children('label').hide();
		$(this).children('.edit').attr('type', 'text');
		$('.edit').keyup(function(e){
			if(e.keyCode==13)
			{
				var taskid=$(this).attr('taskid');
				var taskContent=$(this).val();
				updatedContent(taskid,taskContent);
			
			}
		});
	});

	 $("input[type=checkbox]").click(function() {
        var idTask=this.value;
        if(this.checked){
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
        			notify('Error on deactivation');
        		}
        	});
        	
        }
        else{
        	$.ajax({
        		url:'http://localhost/tasklist/index.php/welcome/setactive',
        		data:{'id':idTask},
        		type:'POST',
        		success:function(data){
        			loadActive();
        			loadInactive();
        		},
        		error:function(x,y,z){
        			notify('Error when activating');
        		}
        	});
        }
    });
}

function notify(text)
{
	$('.notification').html(text);
	$('.notification').show();
	setTimeout(function(){
		$('.notification').hide();
	}, 2000);

}