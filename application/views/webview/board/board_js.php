<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
  function addBoard() {
    const ttlthumbValue = $('#avatar').val();
    const ttltitleValue = $('#labelwork').val();

    var formData = new FormData($("#add_board")[0]);

    // Fetch the values of the checkboxes and append them to the FormData
    var checkboxes = ["sekretaris", "pijar", "media", "literasi", "marcom", "it", "support", "sponsor", "komunitas", "lainnya"];
    var selectedCheckboxes = [];

    var ttlcheckbox = 0;
    checkboxes.forEach(function(checkbox) {
      var isChecked = $("#check_" + checkbox).prop("checked");
      if (isChecked) {
        selectedCheckboxes.push(checkbox);
        ttlcheckbox = ttlcheckbox + 1;
      }
    });

    formData.append("selectedCheckboxes", JSON.stringify(selectedCheckboxes));

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
    } else if (ttlcheckbox == 0) {
      // alert('Input is empty. Please fill it out.');
      swal.fire({
        customClass: 'slow-animation',
        icon: 'error',
        showConfirmButton: false,
        title: 'DIvisi Tidak Boleh Kosong',
        timer: 1500
      });
    } else {
      var url;
      url = "<?php echo site_url('board/saveboard') ?>";

      // window.location = url_base;
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

  function update_board(id) {
    var url;
    url = "<?php echo site_url('board/updateboard') ?>";

    var formData = new FormData($("#edit_board_" + id + "")[0]);

    var checkboxes = ["sekretaris", "pijar", "media", "literasi", "marcom", "it", "support", "sponsor", "komunitas", "lainnya"];
    var selectedCheckboxes = [];

    checkboxes.forEach(function(checkbox) {
      var isChecked = $("#check_edit_" + id + "_" + checkbox).prop("checked");
      if (isChecked) {
        selectedCheckboxes.push(checkbox);
      }
    });

    formData.append("selectedCheckboxes", JSON.stringify(selectedCheckboxes));

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
  function toggleDropdown13(event) {
    event.preventDefault(); // Prevent the default behavior of the button click
    var dropdown = document.querySelector('.dropdown-contentsboard');
    dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
  }

  function toggleDropdown10(event) {
    event.preventDefault(); // Prevent the default behavior of the button click
    var dropdown = document.querySelector('.dropdown-contents10');
    dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
  }

  function toggleDropdown(event, boardId) {
    event.preventDefault(); // Prevent the default behavior of the button click
    var dropdown = document.querySelector(`.dropdown${boardId}`);
    dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
  }
</script>