/*
 * Fast Script
 * Ajax Functions
 * version: 1.0.0
*/

	var fastScript = (function () {
	
				  //base url
				 var Route = {
					base_url: $('#base_url').val()
				 };
				 
				 //languages
				 var Langs = {
					success: 'Changes Succesfully Saved !',
					successFile: 'File Succesfully Uploaded !',
					successDelete: 'Subtitle Succesfully Deleted !',
				 };
				  
				function init() {
					addEventListeners();
				}

				function addEventListeners() {
					
					$('.change-content').hide();
					$('.change-content:first').show();
					$('.nav-item-hold:first').addClass('active');

					$('.nav-item a').click(function(e){
						e.preventDefault();
						var getlink = $(this).attr('href');
						$('.nav-item a').removeClass('active');
						$(this).addClass('active');
						$('.change-content').hide();
						$(getlink).show();
					});

					$('#upload').click(function(){
						$('#file').click();
					});
					
					$('#removeLogo').click(function(){
						var def_logo = Route.base_url + 'assets/images/logo.png';
						$(this).fadeOut();
						$('#logo').val('');
						$('#oldlogo').attr('src', def_logo);
						$('#newlogo').attr('src', def_logo);
					});
					
					
					//Purge Files Cache
					$("#alert-cache").on("click", function() {
						swal( {
							title: "Are you sure?", text: "Caching is the best way to speed up your site, Are you sure you want to remove stored cache?", type: "warning", showCancelButton: !0, confirmButtonColor: "#0CC27E", cancelButtonColor: "#FF586B", confirmButtonText: "Yes, delete it !", cancelButtonText: "No, cancel !", confirmButtonClass: "btn btn-success mr-5", cancelButtonClass: "btn btn-danger", buttonsStyling: !1
						}
						).then(function() {
							
								NProgress.start();
								
								$.ajax({
									type:'POST',
									url: Route.base_url + 'admin/purge'
								})
								.done(function(data){
									if(data) {
										swal("Deleted!", "All caches have been deleted.", "success")
									}
									else
									{
										swal({
											type: "error", title: "Error", text: data, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
										})
									}
								})
								.fail(function(data){
									console.log( data )
								})
								NProgress.done();
								return false;
						}
						)
					});
					
					//Upload Logo
					$('#file').change(function(){
						var ext = $('#file').val().split('.').pop().toLowerCase();
						if ($.inArray(ext, ['png','jpg']) == -1){
							alert('Only png and jpg Files Allowed To Upload.');
						}
						else {
							var form_data = new FormData();
							form_data.append('file', file.files[0]);
							$.ajax({
								url: Route.base_url + 'admin/uploadLogo',
								data: form_data,
								type: 'POST',
								contentType: false,
								processData: false,
								success:function (data) {
									if(data !== 'err') {
										var image_url = Route.base_url + 'files/' + data;
										swal({
											type: "success", title: "Done", text: Langs.successFile, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-success"
										})
										$('#logo').val(data);
										$('#newlogo').show().attr('src', image_url);
										$('#oldlogo').fadeOut();
										$('#removeLogo').fadeIn();
									}
									else {
										swal({
											type: "error", title: "Error", text: data, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
										})
									}
								},
							});
						}
					});
				}
					
					//Setting Form
					$('#setting').submit(function(){
						
						NProgress.start();
						
						$.ajax({
							type:'POST',
							url: Route.base_url + 'admin/saveSettings',
							data:$(this).serialize()
						})
						.done(function(data){
							if(data=='ok') {
								swal({
									type: "success", title: "Done", text: Langs.success, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
								})
							}
							else
							{
								swal({
									type: "error", title: "Error", text: data, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
								})
							}
						})
						.fail(function(data){
							console.log( data )
						})
						NProgress.done();
						return false;
					});
	
					//Account Form
					$('#profile').submit(function(){
						
						NProgress.start();
						
						$.ajax({
							type:'POST',
							url: Route.base_url + 'admin/saveProfile',
							data:$(this).serialize()
						})
						.done(function(data){
							if(data=='ok') {
								swal({
									type: "success", title: "Done", text: Langs.success, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
								})
							}
							else
							{
								swal({
									type: "error", title: "Error", text: data, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
								})
							}
						})
						.fail(function(data){
							console.log( data )
						})
						NProgress.done();
						return false;
					});
					
					//Themes Form
					$('#theme').submit(function(){
						
						NProgress.start();
						
						$.ajax({
							type:'POST',
							url: Route.base_url + 'admin/saveTheme',
							data:$(this).serialize()
						})
						.done(function(data){
							if(data=='ok') {
								swal({
									type: "success", title: "Done", text: Langs.success, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
								})
							}
							else
							{
								swal({
									type: "error", title: "Error", text: data, confirmButtonText: "Close", buttonsStyling: !1, confirmButtonClass: "btn btn-lg btn-danger"
								})
							}
						})
						.fail(function(data){
							console.log( data )
						})
						NProgress.done();
						return false;
					});
  return {
    init: init
  };

}());

//intialize Script
fastScript.init();