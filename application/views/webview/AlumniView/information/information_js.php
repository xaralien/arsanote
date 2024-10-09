<script type="text/javascript">
    $(document).ready(function() {


        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            arrows: false,
            centerMode: true,
            variableWidth: true,
        });




    });


    $('.slick').slick({
        dots: false,
        infinite: true,
        touchThreshold: 100,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerMode: true,
        // autoplay: true,
        // autoplaySpeed: 4000,
        centerPadding: '60px',
        nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    }).on('afterChange', function() {
        changeActiveBg();
    });





    function changeActiveBg() {
        const activeElement = document.querySelector('.slick-current  .bg');
        const backgroundImage = document.querySelector('#background-image');
        backgroundImage.animate([{
            opacity: 0
        }, {
            opacity: 1
        }], {
            duration: 300,
        });
        backgroundImage.src = activeElement.src
    }

    window.onload = changeActiveBg();
</script>

<script>

// sort category
$('#type0,#type1,#type2,#type3,#type4,#type5').click(function(e) {
    e.preventDefault();
    var value = $(this).val(); 
alert(value);
    var uri = "<?php echo $this->uri->segment(2); ?>";
    var val_st = $('#search').val();

    //condtion if category have search
    if(uri=='search'){
        if(value=='All'){
            url = "<?php echo site_url('information/search?st=') ?>" + val_st,
            window.location = url;
        }else{
            url = "<?php echo site_url('information/search?st=') ?>" +val_st+ '&cat='+value, //accommodate search and sort category
            window.location = url;
        }
    }else{
        url = "<?php echo site_url('information/type?cat=') ?>" + value,
        window.location = url;
    }


});

</script>