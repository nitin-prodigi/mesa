$(document).ready(function(){

	$('ul.dropdown').superfish({
		autoArrows: true,
		animation: {height:'show'}
	});  

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$("#menu_listing .actions a").click(function(){
		var type = $(this).attr('rel')
		var parli = $(this).closest('li').attr('id');
		parli = parli.split('_'); 
		parli = parli.slice(-3,4);

		$.fancybox.open({
			type: 'inline',
			href:  '#fancypopup .' + type,
			fitToView: true,
			afterLoad : function(){
				var fthis = $(this);
				$('#fancypopup .' + type+' a').click(function(){

					if(type == 'edit'){
						var inp = $(this).closest('form').find('input').val();
						if(inp.length === 0 || (inp.trim() == ''))
							return false;
						$.ajax({
							url:"/admin/menu/edit",
							type:"POST",
							data:{
								val: inp,
								id: parli[1], 							
							},
							success: function(data){
								if(data == 1){
									location.reload();
								}
							}
							
						});
					} else if(type == 'add'){
						var inp = $(this).closest('form').find('input').val();
						if(inp.length === 0 || (inp.trim() == ''))
							return false;
						$.ajax({
							url:"/admin/menu/add",
							type:"POST",
							data:{
								val: inp,
								level: parli[0], 
								id: parli[1]							
							},
							success: function(data){
								if(data == 1){
									location.reload();
								}
							}
						});
					} else if(type == 'delete'){
						$.ajax({
							url:"/admin/menu/delete",
							type:"POST",
							data:{ 
								id: parli[1]							
							},
							success: function(data){
								if(data == 1){
									location.reload();
								}
							}
						});
					}
				});
			}
		});
	});
});