$(document).ready(function() {
    $(document).on('click','.info_delimg_btn',function(){
		var type = $(this).parent().parent().attr('id').split('_').pop();
		$(this).parent().remove();
		
		var data = "";
		$("#iframe_show_"+type+" img", window.parent.document).each(function(){
			data += $(this).attr("alt")+";";
		});
		$("#info_photo_"+type, window.parent.document).val(data.substr(0,data.length-1));
	});
});