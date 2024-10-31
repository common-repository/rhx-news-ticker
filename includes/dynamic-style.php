<?php function rhx_dynamic_css()
{ ?>
<style type="text/css">
.wpnhtp_body {
 background: <?php $wpnhtp_bg_color = get_option('wpnhtp_bg_color');
if(!empty($wpnhtp_bg_color)) {
echo esc_html($wpnhtp_bg_color);
}
else {
echo esc_html__("#85a243");
}
?>;
 border-radius:<?php $wpnhtp_border_radius = get_option('wpnhtp_border_radius');
if(!empty($wpnhtp_border_radius)) {
echo esc_html($wpnhtp_border_radius);
}
else {
echo esc_html__("5");
}
?>px;
}
.wpnhtp_body ul {
	margin: 0;
	padding: 0;
}
.fade, .slide {
 background: <?php $wpnhtp_bg_color = get_option('wpnhtp_bg_color');
if(!empty($wpnhtp_bg_color)) {
echo esc_html($wpnhtp_bg_color);
}
else {
echo esc_html__("#2d81c8");
}
?>;
}
.typing {
	padding-left: 18px;
}
.fade > li, .slide > li, .typing > li {
	list-style: none inside none;
}
.label {
color:<?php $wpnhtp_label_color = get_option('wpnhtp_label_color');
if(!empty($wpnhtp_label_color)) {
echo esc_html($wpnhtp_label_color);
}
else {
echo esc_html__("#000");
}
?>;
font-weight:bold;
font-size:15px;
}
.wpnhtp_body ul li a {
color:<?php $wpnhtp_text_color = get_option('wpnhtp_text_color');
if(!empty($wpnhtp_text_color)) {
echo esc_html($wpnhtp_text_color);
}
else {
echo esc_html__("#FFF");
}
?>;
border:0 none !important;
}

.wpnhtp_body ul li a:hover {
color:<?php $wpnhtp_hover_color = get_option('wpnhtp_hover_color');
if(!empty($wpnhtp_hover_color)) {
echo esc_html($wpnhtp_hover_color);
}
else {
echo esc_html__("#000");
}?>
}
?>
</style>
<?php 
}
add_action('wp_footer','rhx_dynamic_css', 100);
?>