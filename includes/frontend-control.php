<?php
/**
    Define breaking news style type.
**/
function rhx_slide_script(){?>
<script>
jQuery(document).ready(function() {
    jQuery('.fade').inewsticker({
        speed       : 3000,
        effect      : 'fade',
        dir         : 'ltr',
        font_size   : 13,
        color       : '#fff',
        font_family : 'arial',
        delay_after : 1000      
    });
    jQuery('.slide').inewsticker({
        speed       : 2500,
        effect      : 'slide',
        dir         : 'ltr',
        font_size   : 13,
        color       : '#fff',
        font_family : 'arial',
        delay_after : 1000                      
    });
    jQuery('.typing').inewsticker({
        speed           : 100,
        effect          : 'typing',
        dir             : 'ltr',
        font_size       : 13,
        color           : '#fff',
        font_family     : 'arial',
        delay_after : 1000,

                
    });
}); 
</script>
<?php }
add_action('wp_footer', 'rhx_slide_script');