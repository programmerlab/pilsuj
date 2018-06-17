/*
 *
 * Topdeal_Options_radio_img function
 * Changes the radio select option, and changes class on images
 *
 */
function topdeal_radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');

	jQuery('.topdeal-radio-img-'+labelclass).removeClass('topdeal-radio-img-selected');	
	
	jQuery('label[for="'+relid+'"]').addClass('topdeal-radio-img-selected');
}//function