 function changeLang(index){	  
   $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  jQuery.ajax({
	  url: APP_URL+"/locale",
	  type: 'POST',
	  data: {'locale':index},
	  dataType: 'JSON',
	  success: function (data) {
		  alert(data);
		 location.reload();
	  },
	  error: function(e) {
		console.log(e.responseText);
	  }
  });
}