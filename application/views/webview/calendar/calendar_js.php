<script>
  var myEvents = [
    <?php foreach ($calenderdata as $event) : ?> {
        id: "<?php echo $event->id; ?>",
        name: "<?php echo $event->name; ?>",
        description: "<?php echo $event->description; ?>",
        type: "event",
        date: "<?php echo $event->date; ?>", // Add other fields as needed
      },
    <?php endforeach; ?>
  ];

  // var myEvents = [];

  // <?php foreach ($calenderdata as $event) : ?>
  //   var eventData = {
  //     id: "required-id-1",
  //     name: "Tes",
  //     type: "holiday",
  //     date: "2023-12-30", // Add other fields as needed
  //   };

  //   myEvents.push(eventData);
  // <?php endforeach; ?>

  $('#evoCalendar').evoCalendar({
    calendarEvents: myEvents

  });


  $(document).ready(function() {
    $(".eventcard").slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      prevArrow: ".prevbutton", // Custom previous arrow button
      nextArrow: ".nextbutton",
      speed: 300,
      autoplay: true,
      autoplaySpeed: 5000,

    });
  });
</script>