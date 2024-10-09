<script>

// sort category
$('#type0,#type1,#type2,#type3').click(function(e) {
  e.preventDefault();
  var value = $(this).val(); 

  var uri = "<?php echo $this->uri->segment(2); ?>";
  var val_st = $('#search').val();

  //condtion if category have search
  if(uri=='search'){
    if(value=='all'){
        url = "<?php echo site_url('gallery/search?st=') ?>" + val_st,
        window.location = url;
    }else{
        url = "<?php echo site_url('gallery/search?st=') ?>" +val_st+ '&cat='+value, //accommodate search and sort category
        window.location = url;
    }
  }else{
    url = "<?php echo site_url('gallery/type?cat=') ?>" + value,
    window.location = url;
  }


});

// search
$(function() {

  $('#st').change(function(e) {
    var value = $(this).find('#search').val();

    var uri = "<?php echo $this->uri->segment(2); ?>";
    var val_tp = "<?php echo $this->input->get('cat');?>";

    //condtion if search have category
    if(value==''){
        url = "<?php echo site_url('gallery') ?>",
        window.location = url;

    }else{

        if(uri=='type'){
            if(value=='all'){
                url = "<?php echo site_url('gallery/search?st=') ?>" + value,
                window.location = url;
            }else{
                url = "<?php echo site_url('gallery/search?st=') ?>" +value+ '&cat='+val_tp, //accommodate search and sort category
                window.location = url;
            }
        }else{
            url = "<?php echo site_url('gallery/search?st=') ?>" + value,
            window.location = url;
        }
    }
   
  });
});

</script>