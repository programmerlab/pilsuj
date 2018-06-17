<?php
add_shortcode( 'wishlist_info', 'wishlist_info_callback' );
function wishlist_info_callback($atts){
	$count = function_exists( 'yith_wcwl_count_all_products' ) ?yith_wcwl_count_all_products():0;	
	ob_start();
	?>
		<style>
.top-miniwishlist-icon .wishlist-right h3 { color: #fff; margin: 0 0 3px;font-size: 14px;font-weight: 700;}
.top-miniwishlist-icon .wishlist-right  a,
.top-miniwishlist-icon .wishlist-right  a:hover, .topdeal-miniwishlist .minicart-number{color:#fff;}
.top-form-miniwishlist{cursor:pointer;margin-top:15px;}
.top-miniwishlist-icon .wishlist-contents {float:left;margin-right: 10px;}
.top-miniwishlist-icon .wishlist-contents img{width: auto;height: 31px;}
.top-miniwishlist-icon .wishlist-right{width:90px;}
.header-right{width:260px;}
	</style>
	<div class="top-form top-form-miniwishlist topdeal-miniwishlist pull-right">

	<div class="top-miniwishlist-icon pull-left">
	<a class="wishlist-contents" href="/wishlist" title="View your wishlist">
	<img src="/wp-content/themes/topdeal/assets/img/wishlist-icon.png"  alt=""/>
	</a>
	<div class="wishlist-right pull-right">
	<h3><a class="" href="/wishlist" title="View your wishlist">Wishlist</a></h3>
	<p><a  href="/wishlist" title="View your wishlist"><span class="minicart-number"><?php echo $count;?>Item(s)</span></a></p>
	</div>
	</div>
</div>
<script>
jQuery(document).ready(function($){
$(document).ajaxComplete(function( event, request, settings ) {
if(typeof settings.data !='undefined'){
var prevData = settings.data;
var obj = {}; 
prevData.replace(/([^=&]+)=([^&]*)/g, function(m, key, value) {
    obj[decodeURIComponent(key)] = decodeURIComponent(value);
}); 	
 if(typeof obj.action !='undefined'){
	if(obj.action=='add_to_wishlist'){
	 $('.top-form-miniwishlist .minicart-number').load('/wp-admin/admin-ajax.php?action=get_wishlist_count');
	}else if(obj.action =='remove_from_wishlist'){
	 $('.top-form-miniwishlist .minicart-number').load('/wp-admin/admin-ajax.php?action=get_wishlist_count');	
	}
 }
}
});
});
</script>
	<?php
	$out2 = ob_get_contents();
ob_end_clean();
return $out2;
}

add_action( 'wp_ajax_get_wishlist_count', 'ajax_get_wishlist_item_callback' );

function ajax_get_wishlist_item_callback() {
  $count = function_exists( 'yith_wcwl_count_all_products' ) ?yith_wcwl_count_all_products():0;
  echo $count.'Item(s)';
    wp_die();
}