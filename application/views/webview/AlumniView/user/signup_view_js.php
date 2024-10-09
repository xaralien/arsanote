<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			document.getElementById('confirm_password').disabled = true;
			document.getElementById("regis").disabled = true;
		});



		function regis() {
			var url;
			var formData;
			url = "<?php echo site_url('Autentic/signup') ?>";
			var formData = new FormData($("#formregis")[0]);
			$.ajax({
				url: url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				beforeSend: function() {
					// showLoading("Saving data...", "Mohon tunggu");
				},
				success: function(data) {
                    if (data.status){
					swal.fire({
						customClass: 'slow-animation',
						icon: 'success',
						showConfirmButton: false,
						title: 'Berhasil Membuat Akun',
						timer: 1500

					});
					location.href = ('home');
                }
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Operation Failed!', errorThrown, 'error');
				},
				complete: function() {
					console.log('Editing job done');
				}
			});
		}


		
	</script>