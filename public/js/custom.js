function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function sitemsgs()
{
	if($('.sitemsgs p').length){
		$('.sitemsgs p').first().fadeOut('slow',function(){
			$('.sitemsgs p').first().remove();
		});
		setTimeout(sitemsgs, 2000);
	} else{
		$('.sitemsgs').fadeOut('slow',function(){
			$('.sitemsgs').remove();
		});
	}
}

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


// menu page
	$(".menu .actions a").click(function(){
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


// topics page
	$(".topic .actions a").click(function(){
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

					var pageslug = $('#pageslug').val();
					if(type == 'edit'){
						var inp = $(this).closest('form').find('input').val();
						if(inp.length === 0 || (inp.trim() == ''))
							return false;
						$.ajax({
							url:"/admin/topic/edit",
							type:"POST",
							data:{
								pageslug: pageslug,
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
							url:"/admin/topic/add",
							type:"POST",
							data:{
								pageslug: pageslug,
								val: inp,
								level: ++parli[0], 
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
							url:"/admin/topic/delete",
							type:"POST",
							data:{
								pageslug: pageslug,
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

	$(".topic .right .add").click(function(){
		$.fancybox.open({
			type: 'inline',
			href:  '#fancypopup .add',
			fitToView: true,
			afterLoad : function(){
				var fthis = $(this);
				$('#fancypopup .add a').click(function(){
					var pageslug = $('#pageslug').val();
					var inp = $(this).closest('form').find('input').val();
					if(inp.length === 0 || (inp.trim() == ''))
						return false;
					$.ajax({
						url:"/admin/topic/add",
						type:"POST",
						data:{
							pageslug: pageslug,
							val: inp,
							level: 0, 
							id: 0							
						},
						success: function(data){
							if(data == 1){
								location.reload();
							}
						}
					});

				});
			}
		});
	});

// media page
	var asts = [];
	function getmedia(json, relkey)
	{
		$.each(json, function(i,v){
			if(typeof(v) == 'object'){
				if(i === relkey){
					$.each(v, function(k,c){
						if(isNumeric(k)){
							asts.push(c);
						}
					});
					return false;
				} else{
					getmedia(json[i], relkey);
				}
			}
		});
		return asts;
	}

	$('.media .dirstructure li a').click(function(){
		var nm = $(this).html();
		var pval = $(this).attr('rel');
		$('.media .path span').html(nm);
		$('.media .path input').val(pval);

		asts = [];
		var resc = getmedia(mediajson, pval);
		$('.media .listing').empty();
		$.each(resc, function(i,v){
			var li = $('<li/>');
			var a = $('<a>',{
				'href' : v,
				'target' : '_blank'
			}).appendTo(li);

			var nm = v.split('/').pop();
			if (/(jpg|gif|png|JPG|GIF|PNG|JPEG|jpeg)$/.test(v)){
				var i = $('<img />',{
					'src' : v,
				}).appendTo(a);
			} else{
				var i = $('<img />',{
					'src' : '/img/doc.png',
				}).appendTo(a);
			}


			$('<span/>',{'class':'name'}).text(nm).appendTo(li);
			$('<a/>',{'href':'javascript:void(0)', 'class':'delete'}).text('delete').appendTo(li);
			$('.media .listing').append(li);
		});
	});
	$('.media .dirstructure li').first().find('a').first().trigger('click');

	$('.media .listing').on('click', '.delete', function(){
		var del = $('.path input').val();
		var nm = $(this).parent().find('span').html();
		$.ajax({
			url:"/admin/media/delete",
			type:"POST",
			data:{
				path: del,
				nm: nm
			},
			success: function(data){
				if(data == 1){
					location.reload();
				}
			}
		});
	});
	

	$(".media .top .right a").click(function(){
		var type = $(this).attr('rel')
		var path = $('.path input').val();

		$.fancybox.open({
			type: 'inline',
			href:  '#fancypopup .' + type,
			fitToView: true,
			afterLoad : function(){
				var fthis = $(this);
				$('#fancypopup .' + type+' a').click(function(){
					if(type == 'add'){
						var inp = $(this).closest('form').find('input').val();
						if(inp.length === 0 || (inp.trim() == ''))
							return false;
						$.ajax({
							url:"/admin/media/add",
							type:"POST",
							data:{
								path: path,
								fld: inp							
							},
							success: function(data){
								if(data == 1){
									location.reload();
								}
							}
						});
					} else if(type == 'delete'){
						$.ajax({
							url:"/admin/media/rmdir",
							type:"POST",
							data:{
								path: path							
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

// article page
	var $art_sel, $curr_topic;
	function sorttopics(topicsjson, lev)
	{
		if(lev == 1){
			var optj = {
				'value':0,
			}
			if($curr_topic == 0){
				optj.selected = 'selected'; 
				optj.disabled = 'disabled'; 
			}
			$('<option/>',optj).text('-- -- all -- --').appendTo($art_sel);
		}

		var slev = Array(lev).join(' -- ');
		$.each(topicsjson, function(i,v) {
			var optj = {
				'value':v['id'],
			}
			if($curr_topic == v['id']){
				optj.selected = 'selected'; 
			}
			$('<option/>',optj).text(slev+v['title']).appendTo($art_sel);
			if(v['child']){
				sorttopics(v['child'], ++lev);
			}
		});
	}

	$('.article select#menu').change(function(){
		var men = $(this).val();
		$.ajax({
			url:"/admin/article/search",
			type:"POST",
			dataType: 'json',
			data:{
				menu: men
			},
			success: function(data){
				$('.article select#topic').empty();
				$art_sel = $('.article select#topic');
				$curr_topic = $('#seltopic').val();
				sorttopics(data,1);
			}
		});

		// reference
		if($('.article .secwrap select#reference').length){
			$.ajax({
				url:"/admin/article/reference",
				type:"POST",
				dataType: 'json',
				data:{
					menu: men
				},
				success: function(data){
					var $secwrap = $('.secwrap select#reference');
					$($secwrap).empty();
					$.each(data, function(i,v) {
						var optj = {
							'value':v['id'],
						}
						if(refers.indexOf(v['id']) > -1){
							optj.selected = 'selected'; 
						}
						$('<option/>',optj).text(v['title']).appendTo($secwrap);
					});
				}
			});
		}
	});
	$('.article select#menu').trigger('change');

	$(".article .right .delete").click(function(){
		$.fancybox.open({
			type: 'inline',
			href:  '#fancypopup .delete',
			fitToView: true,
			afterLoad : function(){
				var fthis = $(this);
				$('#fancypopup .delete a').click(function(e){
					e.stopPropagation();
					var artichecks = [];
					$(".grunth tbody input[type='checkbox']:checked").each(function(){
						artichecks.push($(this).val());
					});
					if(artichecks.length){
						$.ajax({
							url:"/admin/article/delete",
							type:"POST",
							data:{
								formarr: artichecks,
							},
							success: function(data){
								if(data == 1){
									location.reload();
								}
							}
						});
					} else{
						return false;
					}
					$('#fancypopup .delete a').unbind('click');
				});
			}
		});
	});

	$(".article .grunth .status").click(function(){
		var artid = $(this).closest('tr').attr('id');
		artid = artid.split('_');
		artid = artid[artid.length - 1];
		$.ajax({
			url:"/admin/article/status",
			type:"POST",
			data:{
				id: artid,
			},
			success: function(data){
				if(data == 1){
					location.reload();
				}
			}
		});
	});

});