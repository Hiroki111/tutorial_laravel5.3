function confirmationForDeletingEntry(entry){
	return confirm("Do you really wish to remove "+ entry +" ?");	
}

tinymce.init({
  selector: 'textarea',
  height: 230,
  plugins: 'link image code',
  convert_urls: false,
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
