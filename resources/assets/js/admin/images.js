function deleteImage(title, id){
	
	$("#deleteListDiv").fadeIn("slow");
	$("#deleteForm").fadeIn("slow");
	// $("#deleteListDiv").attr("display", "block");
	// $("#deleteForm").attr("display", "block");
	
	var input = $("<span> "+title+" </span>");
	$('#deleteList').append(input);

	console.log("#image_"+id);
	var input = $("<input value='"+id+"' name='imageIds[]' type='hidden' class='images_to_delete'>");
	$('#imagesToDelete').append(input);
	$("#image_"+id).remove();	
}