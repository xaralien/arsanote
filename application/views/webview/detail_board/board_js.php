<script src="../../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
  // === Define Variables and Elements ===
  var elements = document.querySelectorAll('.box .item');
  var targetEl;
  var wrapper = document.getElementById("box");

  var itemClip = document.getElementById("itemClip");

  var scopeObj;

  // === Event Binding ===
  for (var i = 0, max = elements.length; i < max; i++) {
    elements[i].addEventListener("dragstart", handleDrag);
    elements[i].addEventListener("dragend", handleDragEnd);
    elements[i].addEventListener("dragenter", handleDragEnter);

    elements[i].addEventListener("touchstart", handleTouch);
    elements[i].addEventListener("touchend", handleTouchEnd);
    elements[i].addEventListener("touchmove", handleTouchMove);
  }

  // === Function Kits ===
  function handleDrag(event) {
    targetEl = event.target;
    targetEl.classList.add("onDrag");
  }

  function handleDragEnd(event) {
    targetEl.classList.remove("onDrag");
  }

  function handleDragEnter(event) {
    wrapper.insertBefore(targetEl, event.target);
  }

  function handleTouch(event) {
    defineScope(elements);
    targetEl = event.target;
    itemClip.style.top = event.changedTouches[0].clientY + "px";
    itemClip.style.left = event.changedTouches[0].clientX + "px";
    itemClip.innerText = event.target.innerText;
    itemClip.classList.remove("hide");
    targetEl.classList.add("onDrag");
  }

  function handleTouchEnd(event) {
    itemClip.classList.add("hide");
    targetEl.classList.remove("onDrag");
  }

  function handleTouchMove(event) {
    itemClip.style.top = event.changedTouches[0].clientY + "px";
    itemClip.style.left = event.changedTouches[0].clientX + "px";
    hitTest(event.changedTouches[0].clientX, event.changedTouches[0].clientY);
  }

  function hitTest(thisX, thisY) {
    for (var i = 0, max = scopeObj.length; i < max; i++) {
      if (thisX > scopeObj[i].startX && thisX < scopeObj[i].endX) {
        if (thisY > scopeObj[i].startY && thisY < scopeObj[i].endY) {
          wrapper.insertBefore(targetEl, scopeObj[i].target);
          return;
        }
      }
    }
  }

  function defineScope(elementArray) {
    scopeObj = [];
    for (var i = 0, max = elementArray.length; i < max; i++) {
      var newObj = {};
      newObj.target = elementArray[i];
      newObj.startX = elementArray[i].offsetLeft;
      newObj.endX = elementArray[i].offsetLeft + elementArray[i].offsetWidth;
      newObj.startY = elementArray[i].offsetTop;
      newObj.endY = elementArray[i].offsetTop + elementArray[i].offsetHeight;
      scopeObj.push(newObj);
    }
  }


  function toggleForm() {
    var form = document.getElementById("form_add_list");
    form.hidden = !form.hidden;
    // Optionally, you can hide the button when the form is shown
    var button = document.getElementById("button_add_list");
    button.hidden = !button.hidden;
  }

  function cancelForm() {
    var form = document.getElementById("form_add_list");
    form.hidden = true;
    var button = document.getElementById("button_add_list");
    button.hidden = false;
  }

  function toggleFormCard(listid) {
    var formcard = document.getElementById("form_add_card_" + listid);
    formcard.hidden = !formcard.hidden;
    // Optionally, you can hide the button when the form is shown
    var buttoncard = document.getElementById("button_add_card_" + listid);
    buttoncard.hidden = !buttoncard.hidden;
  }

  function cancelFormCard(listid) {
    var formcard = document.getElementById("form_add_card_" + listid);
    formcard.hidden = true;
    var buttoncard = document.getElementById("button_add_card_" + listid);
    buttoncard.hidden = false;
  }

  function saveList(id) {
    const ttlListValue = $('#text_add_list').val();

    if (!ttlListValue) {
      // alert('Input is empty. Please fill it out.');
      swal.fire({
        customClass: 'slow-animation',
        icon: 'error',
        showConfirmButton: false,
        title: 'Nama List Tidak Boleh Kosong',
        timer: 1500
      });
    } else {
      var url;
      var formData;
      url = "<?php echo site_url('detailboard/savelist/') ?>" + id;
      var formData = new FormData($("#add_list")[0]);
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
            timer: 1500,
            showConfirmButton: false,
            title: 'Loading...'

          });

        },
        success: function(data) {
          if (!data.status) swal.fire('Gagal menyimpan data', 'error');
          else {
            $('#add_list')[0].reset();
            (JSON.stringify(data));
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

  function saveCard(listid) {
    const ttlListValue = $('#text_add_card_' + listid).val();

    if (!ttlListValue) {
      // alert('Input is empty. Please fill it out.');
      swal.fire({
        customClass: 'slow-animation',
        icon: 'error',
        showConfirmButton: false,
        title: 'Nama List Tidak Boleh Kosong',
        timer: 1500
      });
    } else {
      var url;
      var formData;
      url = "<?php echo site_url('detailboard/savecard/') ?>" + listid;
      var formData = new FormData($("#add_card_" + listid)[0]);
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
            timer: 1500,
            showConfirmButton: false,
            title: 'Loading...'

          });
        },
        success: function(data) {
          /* if(!data.status)alert("ho"); */
          if (!data.status) swal.fire('Gagal menyimpan data', 'error');
          else {
            // document.getElementById('rumahadat').reset();
            (JSON.stringify(data));
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

  function savePositions() {
    var positions = [];
    $('.item').each(function() {
      var position = {
        id: $(this).data('id'), // Item ID
        position_number: $(this).index() // Position number
      };
      positions.push(position);
    });

    url = "<?php echo site_url('detailboard/updateposition/') ?>";

    // Send positions to the controller using AJAX
    $.ajax({
      url: url,
      type: "POST",
      data: {
        positions: positions
      },
      dataType: "json", // Corrected the case of "json"
      beforeSend: function() {
        swal.fire({
          icon: 'info',
          timer: 1500,
          showConfirmButton: false,
          title: 'Loading...'

        });
      },
      success: function(data) {
        /* if(!data.status)alert("ho"); */
        if (!data.status) swal.fire('Gagal menyimpan data', 'error');
        else {
          // document.getElementById('rumahadat').reset();
          $('#add_modal').modal('hide');
          $('#school_add')[0].reset();
          (JSON.stringify(data));
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

  function onCardPosition(id) {
    $.ajax({
      url: "<?php echo site_url('detailboard/card_item/') ?>/" + id,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
        // Clear the existing dynamic list items
        $('#box_card').empty();

        // Iterate over the received data and create list items
        for (var i = 0; i < data.length; i++) {
          var truncatedName = data[i].name.substring(0, 20);

          var listItem = $('<div id="card_items" class="item" data-id="' + data[i].id + '" draggable="true">' + truncatedName + '</div>');
          $('#box_card').append(listItem);
        }
        var lastItem = $('<div class="item"></div>');
        $('#box_card').append(lastItem);

        var buttonconfirm = $('<button onclick="savePositionsCard(' + id + ')" type="button" class="btn btn-primary">Save changes</button>');
        $('#card_button').append(buttonconfirm);

        // Your existing code to show the modal
        $('#card_position').modal('show');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });
  }

  function DeleteList(id) {

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
      title: 'Apakah anda yakin ingin menghapus List?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus List',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({
          url: "<?php echo site_url('detailboard/deletelist/') ?>" + id,
          type: "POST",
          data: {
            id_delete: id
          },
          dataType: "JSON",
          beforeSend: function() {
            // showLoading("Saving data...", "Mohon tunggu");
          },
          success: function(data) {
            if (!data.status) showAlert('Gagal!', data.message.toString().replace(/<[^>]*>/g, ''), 'error');
            else {
              swalWithBootstrapButtons.fire(
                'Terhapus!',
                'List berhasil dihapus.',
                'success'
              )
              location.reload();
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            swalWithBootstrapButtons.fire(
              'Gagal',
              'List gagal dihapus',
              'error'
            )
          },
          complete: function() {
            console.log('published job done');
          }
        });


      }

    })
  }

  function onEdit(id) {
    $('#detailcard_form')[0].reset(); // reset form on modals

    $.ajax({
      url: "<?php echo site_url('detailboard/ajax_edit_card/') ?>" + id,
      type: "POST",
      dataType: "JSON",
      success: function(result) {

        var data = result.data;
        var label = result.label;
        var checklist = result.checklist;
        var activity = result.activity;

        JSON.stringify(data.id);
        // alert(JSON.stringify(data));

        $('#id_detail_label').val(data.id);
        $('#id_detail_checklist').val(data.id);
        $('#id_detail_activity').val(data.id);
        $('#id_detail').val(data.id);
        $('#card_title').val(data.name);
        $('#card_desc').val(data.description);

        function formatDateForInput(inputDate) {
          var date = new Date(inputDate);
          var year = date.getFullYear();
          var month = ('0' + (date.getMonth() + 1)).slice(-2);
          var day = ('0' + date.getDate()).slice(-2);
          return year + '-' + month + '-' + day;
        }

        var formattedDate = formatDateForInput(data.date);
        $('#card_date').val(formattedDate);

        $('#label_list').empty(); // reset form on modals
        $.each(label, function(index, item) {
          var labelCardHtml = '<div class="labeling d-flex justify-content-center align-items-center my-2">';
          labelCardHtml += '<input type="color" id="input_color_' + item.id + '" class="color" name="color" value="' + item.color + '" />';
          labelCardHtml += '<input type="text" id="input_label_' + item.id + '" name="labelInput" placeholder="Label" class="labelsinput my-0 mx-2" value="' + item.name + '" />';
          labelCardHtml += '<button onclick="editLabel(' + item.id + ')" class="btn btnedit">';
          labelCardHtml += '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">';
          labelCardHtml += '<path d="M13.3782 5.07534L9.89 1.62329L11.039 0.472603C11.3537 0.157534 11.7402 0 12.1988 0C12.6573 0 13.0436 0.157534 13.3577 0.472603L14.5067 1.62329C14.8213 1.93836 14.9855 2.31863 14.9991 2.76411C15.0128 3.20959 14.8624 3.58959 14.5477 3.90411L13.3782 5.07534ZM12.1881 6.28767L3.48817 15H0V11.5068L8.69991 2.79452L12.1881 6.28767Z" fill="black" fill-opacity="0.8" />';
          labelCardHtml += '</svg>';
          labelCardHtml += '</button>';
          labelCardHtml += '</div>';

          $('#label_list').append(labelCardHtml);
        });


        $('#checklist_list').empty(); // reset form on modals
        $.each(checklist, function(index, item) {
          var checkItemHtml = '<div class="barcheck d-flex justify-content-center align-items-center ms-4 my-4">';
          checkItemHtml += '<div class="form-check">';
          checkItemHtml += '<input onchange="checklist_task(' + item.id + ', this.checked)" class="form-check-input" type="checkbox" ' + (item.status == 1 ? 'checked' : '') + ' id="flexCheckDefault">';
          checkItemHtml += '</div>';
          checkItemHtml += '<div class="inputcheck">';
          checkItemHtml += '<input type="text" class="form-control" placeholder="Name" value="' + item.name + '" oninput="handleInputChange(' + item.id + ', this)">';
          checkItemHtml += '<input type="text" class="form-control" placeholder="Note" value="' + item.note + '" oninput="handleInputChangeNote(' + item.id + ', this)">';
          checkItemHtml += '</div>';
          checkItemHtml += '<a onclick="delete_checklist(' + item.id + ')">';
          checkItemHtml += '<div class="editpen ms-2">';
          checkItemHtml += '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">';
          checkItemHtml += '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>';
          checkItemHtml += '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>';
          checkItemHtml += '</svg>';
          checkItemHtml += '</div>';
          checkItemHtml += '</a>';
          checkItemHtml += '</div>';

          $('#checklist_list').append(checkItemHtml);
        });

        $('#activity_list').empty(); // reset form on modals
        $.each(activity, function(index, item) {

          var firstLetterName = item.name.charAt(0);

          var activityCardHtml = '<div class="cardavt" style="margin-top: -20px;">';
          activityCardHtml += '<div class="tags">';
          activityCardHtml += '<p class="d-flex justify-content-center">' + firstLetterName + '</p>';
          activityCardHtml += '</div>';
          activityCardHtml += '<div class="inputs">';
          activityCardHtml += '<div class="profile d-flex">';
          activityCardHtml += '<p>' + item.name + '</p>';
          activityCardHtml += '<p class="mx-3">' + item.created + '</p>';
          activityCardHtml += '</div>';
          activityCardHtml += '<input id="message_' + item.id + '" type="text" class="form-control" value="' + item.message + '" readonly oninput="handleInputChangeMessage(' + item.id + ', this)">';
          activityCardHtml += '<div class="sunting mx-3 my-2">';

          if (item.id_user == "<?= $this->session->userdata('user_user_id') ?>") {
            activityCardHtml += '<a onclick="editActivity(' + item.id + ')" class="mx-3">Edit</a>';
            activityCardHtml += '<a onclick="DeleteActivity(' + item.id + ')" class="mx-3">Delete</a>';
          } else {
            // Additional code for the else condition if needed
          }
          activityCardHtml += '</div>';
          activityCardHtml += '</div>';
          activityCardHtml += '</div>';

          $('#activity_list').append(activityCardHtml);
        });

        $('.form-check-input').on('change', function() {
          updatePercentage();
        });

        // Function to update the percentage and progress bar
        function updatePercentage() {
          var totalItems = $('.form-check-input').length;
          var checkedItems = $('.form-check-input:checked').length;

          var percentage = (checkedItems / totalItems) * 100;
          var roundedPercentage = Math.round(percentage);

          // Update progress bar
          $('#persen_checklist').css('width', 0 + '%');
          $('#persen_checklist').css('width', percentage + '%');
          $('#persen_checklist').attr('aria-valuenow', roundedPercentage);


          // Update label
          $('#label_persen_checklist').text('');
          if (!isNaN(roundedPercentage)) {
            $('#label_persen_checklist').text(roundedPercentage + '%');
          }
        }

        // Initial update on page load
        updatePercentage();


      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });
  }



  function add_label() {
    const ttlListValue = $('#labelInput').val();

    if (!ttlListValue) {
      // alert('Input is empty. Please fill it out.');
      swal.fire({
        customClass: 'slow-animation',
        icon: 'error',
        showConfirmButton: false,
        title: 'Nama Label Tidak Boleh Kosong',
        timer: 1500
      });
    } else {
      var url;
      var formData;
      url = "<?php echo site_url('detailboard/savelabel/') ?>";
      var formData = new FormData($("#label_form_new")[0]);
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
            timer: 1500,
            showConfirmButton: false,
            title: 'Loading...'

          });

        },
        success: function(data) {
          if (!data.status) swal.fire('Gagal menyimpan data', 'error');
          else {
            $('#add_list')[0].reset();
            (JSON.stringify(data));
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

  function addchecklist() {
    const ttlListValue = $('#checklist_name').val();

    if (!ttlListValue) {
      // alert('Input is empty. Please fill it out.');
      swal.fire({
        customClass: 'slow-animation',
        icon: 'error',
        showConfirmButton: false,
        title: 'Nama Checklist Tidak Boleh Kosong',
        timer: 1500
      });
    } else {
      var url;
      var formData;
      url = "<?php echo site_url('detailboard/savechecklist/') ?>";
      var formData = new FormData($("#form_add_checklist")[0]);
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
            timer: 1500,
            showConfirmButton: false,
            title: 'Loading...'

          });

        },
        success: function(data) {
          if (!data.status) swal.fire('Gagal menyimpan data', 'error');
          else {
            $('#add_list')[0].reset();
            (JSON.stringify(data));
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

  function saveDetail() {
    var url;
    url = "<?php echo site_url('detailboard/udpdatecard/') ?>";

    var formData = new FormData($("#detailcard_form")[0]);
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

  function handleInputChange(itemId, inputElement) {
    // Clear any existing timeout to avoid multiple rapid requests
    clearTimeout(inputElement.timeout);

    // Set a new timeout to delay the execution of the update function
    inputElement.timeout = setTimeout(function() {
      updateName(itemId, inputElement.value);
    }, 500); // Adjust the delay (in milliseconds) as needed
  }

  function updateName(itemId, newName) {
    const formData = new FormData();
    formData.append('itemId', itemId);
    formData.append('newName', newName);


    url = "<?php echo site_url('detailboard/udpdatchecklistname/') ?>";

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

  function handleInputChangeNote(itemId, inputElement) {
    // Clear any existing timeout to avoid multiple rapid requests
    clearTimeout(inputElement.timeout);

    // Set a new timeout to delay the execution of the update function
    inputElement.timeout = setTimeout(function() {
      updateNote(itemId, inputElement.value);
    }, 500); // Adjust the delay (in milliseconds) as needed
  }

  function updateNote(itemId, newNote) {
    const formData = new FormData();
    formData.append('itemId', itemId);
    formData.append('newNote', newNote);


    url = "<?php echo site_url('detailboard/udpdatchecklistnote/') ?>";

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

  function checklist_task(id, isChecked) {
    const formData = new FormData();
    formData.append('idCard', id);
    formData.append('isChecked', isChecked ? 1 : 0);


    url = "<?php echo site_url('detailboard/udpdatchecklist/') ?>";

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

  function delete_checklist(itemId) {
    const formData = new FormData();
    formData.append('itemId', itemId);


    url = "<?php echo site_url('detailboard/delete_checklist/') ?>";

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

  function addActivity() {
    const ttlListValue = $('#message').val();

    if (!ttlListValue) {
      // alert('Input is empty. Please fill it out.');
      swal.fire({
        customClass: 'slow-animation',
        icon: 'error',
        showConfirmButton: false,
        title: 'Nama Message Tidak Boleh Kosong',
        timer: 1500
      });
    } else {
      var url;
      var formData;
      url = "<?php echo site_url('detailboard/saveactivity/') ?>";
      var formData = new FormData($("#addActivity")[0]);
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
            timer: 1500,
            showConfirmButton: false,
            title: 'Loading...'

          });

        },
        success: function(data) {
          if (!data.status) swal.fire('Gagal menyimpan data', 'error');
          else {
            (JSON.stringify(data));
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

  function DeleteActivity(itemId) {
    const formData = new FormData();
    formData.append('itemId', itemId);

    url = "<?php echo site_url('detailboard/delete_activity/') ?>";

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

  function editLabel(itemId) {
    const formData = new FormData();
    formData.append('color', $('#input_color_' + itemId).val());
    formData.append('labelInput', $('#input_label_' + itemId).val());
    formData.append('itemId', itemId);
    url = "<?php echo site_url('detailboard/updatelabel/') ?>";

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

  function editActivity(itemId) {
    // Construct the input ID based on the item ID
    var inputId = 'message_' + itemId;

    // Get the input element by ID
    var inputElement = document.getElementById(inputId);

    // Remove the readonly attribute
    inputElement.readOnly = false;

    // Additional logic for handling the edit action if needed
  }

  function handleInputChangeMessage(itemId, inputElement) {
    // Clear any existing timeout to avoid multiple rapid requests
    clearTimeout(inputElement.timeout);

    // Set a new timeout to delay the execution of the update function
    inputElement.timeout = setTimeout(function() {
      updateMessage(itemId, inputElement.value);
    }, 500); // Adjust the delay (in milliseconds) as needed
  }

  function updateMessage(itemId, newMessage) {
    const formData = new FormData();
    formData.append('itemId', itemId);
    formData.append('newMessage', newMessage);


    url = "<?php echo site_url('detailboard/updateactivity/') ?>";

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

  $(document).ready(function() {
    $("#btnCreateLabel").on("click", function() {
      $("#label_new").show();
    });
  });

  (function($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
      $("body").toggleClass("sidebar-toggled");
      $(".sidebar").toggleClass("toggled");
      if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
      };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function() {
      if ($(window).width() < 768) {
        $('.sidebar .collapse').collapse('hide');
      };

      // Toggle the side navigation when window is resized below 480px
      if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
        $("body").addClass("sidebar-toggled");
        $(".sidebar").addClass("toggled");
        $('.sidebar .collapse').collapse('hide');
      };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
      if ($(window).width() > 768) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
      }
    });

    // Scroll to top button appear
    $(document).on('scroll', function() {
      var scrollDistance = $(this).scrollTop();
      if (scrollDistance > 100) {
        $('.scroll-to-top').fadeIn();
      } else {
        $('.scroll-to-top').fadeOut();
      }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(e) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: ($($anchor.attr('href')).offset().top)
      }, 1000, 'easeInOutExpo');
      e.preventDefault();
    });

  })(jQuery); // End of use strict
</script>




<script>
  // Function to toggle dropdown
  const toggleDropdown = function(dropdownBtn, dropdownMenu, toggleArrow) {
    dropdownMenu.classList.toggle("show");
    toggleArrow.classList.toggle("arrow");
  };

  // First Dropdown
  const dropdownBtn1 = document.getElementById("btnlabels");
  const dropdownMenu1 = document.getElementById("dropdowns");
  const toggleArrow1 = document.getElementById("arrow");

  // Toggle dropdown open/close when first dropdown button is clicked
  dropdownBtn1.addEventListener("click", function(e) {
    e.stopPropagation();
    toggleDropdown(dropdownBtn1, dropdownMenu1, toggleArrow1);
  });

  // Close first dropdown when document is clicked
  document.documentElement.addEventListener("click", function() {
    if (dropdownMenu1.classList.contains("show")) {
      toggleDropdown(dropdownBtn1, dropdownMenu1, toggleArrow1);
    }
  });

  // Prevent closing first dropdown when menu is clicked
  dropdownMenu1.addEventListener("click", function(e) {
    e.stopPropagation();
  });

  // Second Dropdown
  const dropdownBtn2 = document.getElementById("btncek");
  const dropdownMenu2 = document.getElementById("dropdowns1");
  const toggleArrow2 = document.getElementById("arrow1");

  // Toggle dropdown open/close when second dropdown button is clicked
  dropdownBtn2.addEventListener("click", function(e) {
    e.stopPropagation();
    toggleDropdown(dropdownBtn2, dropdownMenu2, toggleArrow2);
  });

  // Close second dropdown when document is clicked
  document.documentElement.addEventListener("click", function() {
    if (dropdownMenu2.classList.contains("show")) {
      toggleDropdown(dropdownBtn2, dropdownMenu2, toggleArrow2);
    }
  });

  // Prevent closing second dropdown when menu is clicked
  dropdownMenu2.addEventListener("click", function(e) {
    e.stopPropagation();
  });

  // third Dropdown
  const dropdownBtn3 = document.getElementById("btndate");
  const dropdownMenu3 = document.getElementById("dropdowns2");
  const toggleArrow3 = document.getElementById("arrow");

  // Toggle dropdown open/close when second dropdown button is clicked
  dropdownBtn3.addEventListener("click", function(e) {
    e.stopPropagation();
    toggleDropdown(dropdownBtn3, dropdownMenu3, toggleArrow3);
  });

  // Close second dropdown when document is clicked
  document.documentElement.addEventListener("click", function() {
    if (dropdownMenu3.classList.contains("show")) {
      toggleDropdown(dropdownBtn3, dropdownMenu3, toggleArrow3);
    }
  });

  // Prevent closing second dropdown when menu is clicked
  dropdownMenu3.addEventListener("click", function(e) {
    e.stopPropagation();
  });
</script>