function deleteImage(title, id){
	
	$("#deleteListDiv").fadeIn("slow");
	$("#deleteForm").fadeIn("slow");
	
	var input = $("<span> "+title+" </span>");
	$('#deleteList').append(input);

	var input = $("<input value='"+id+"' name='imageIds[]' type='hidden' class='images_to_delete'>");
	$('#imagesToDelete').append(input);
	$("#image_"+id).remove();	
}