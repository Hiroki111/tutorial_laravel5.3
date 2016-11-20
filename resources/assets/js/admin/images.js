function deleteImage(title, id){
	var ok =  confirm("Do you really wish to delete "+ title +" ?");	
	if (ok) {
		//document.getElementById("deletingImage").value = "";
		//var fileName = document.getElementById('image_'+id);
		//fileName.remove();

		console.log("#image_"+id);
		$("#image_"+id).remove();
	}
}