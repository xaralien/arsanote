<script src="../../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
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

  function toggleFormCard() {
    var formcard = document.getElementById("form_add_card");
    formcard.hidden = !formcard.hidden;
    // Optionally, you can hide the button when the form is shown
    var buttoncard = document.getElementById("button_add_card");
    buttoncard.hidden = !buttoncard.hidden;
  }

  function cancelFormCard() {
    var formcard = document.getElementById("form_add_card");
    formcard.hidden = true;
    var buttoncard = document.getElementById("button_add_card");
    buttoncard.hidden = false;
  }

  function saveList() {
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
      url = "<?php echo site_url('Home/savelist') ?>";
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
  }

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