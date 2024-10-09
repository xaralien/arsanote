<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
    function addWorkspace() {
        const ttlthumbValue = $('#avatar').val();
        const ttltitleValue = $('#labelwork').val();

        if (!ttlthumbValue) {
            // alert('Input is empty. Please fill it out.');
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom File Thumbnail Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltitleValue) {
            // alert('Input is empty. Please fill it out.');
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Title Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            var url;
            var formData;
            url = "<?php echo site_url('workspace/saveworkspace') ?>";

            // window.location = url_base;
            var formData = new FormData($("#add_workspace")[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                beforeSend: function() {
                    swal.fire({
                        icon: 'info',
                        timer: 3000,
                        showConfirmButton: false,
                        title: 'Loading...'

                    });
                },
                success: function(data) {
                    /* if(!data.status)alert("ho"); */
                    if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                    else {
                        // document.getElementById('rumahadat').reset();
                        // $('#add_modal').modal('hide');
                        (JSON.stringify(data));
                        // alert(data)
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'success',
                            showConfirmButton: false,
                            title: 'Berhasil Menambahkan Konten',
                            timer: 1500
                        });

                        location.reload();

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire('Operation Failed!', errorThrown, 'error');
                },
                complete: function() {
                    console.log('Editing job done');
                }
            });
        }
    }

    function editworkspace(id) {
        var url;
        url = "<?php echo site_url('workspace/updateworkspace/') ?>" + id;

        var formData = new FormData($("#edit_workspace_" + id + "")[0]);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                swal.fire("Saving data...");

            },
            success: function(data) {
                /* if(!data.status)alert("ho"); */
                if (!data.status) swal.fire('Gagal menyimpan data', 'error ');
                else {
                    // document.getElementById('PakaianAdat').reset();

                    (JSON.stringify(data));
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'Berhasil Mengedit Konten',
                        timer: 1500

                    });

                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal.fire('Operation Failed!', errorThrown, 'error');
            },
            complete: function() {
                console.log('Editing job done');

            }

        });
    }

    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl; // Redirect to the delete URL if confirmed
            }
        });
    }
</script>

<script>
    function toggleDropdown(event) {
        event.preventDefault(); // Prevent the default behavior of the button click

        var dropdown = document.querySelector('.dropdown-contents');
        dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
    }

    function toggleDropdown1(cardId) {
        var dropdown = document.getElementById('dropdown-contents' + cardId);
        dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
    }
</script>