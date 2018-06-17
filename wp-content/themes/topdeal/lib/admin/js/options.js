jQuery(document).ready(function(){
	
	
	if(jQuery('#last_tab').val() == ''){

		jQuery('.topdeal-opts-group-tab:first').slideDown('fast');
		jQuery('#topdeal-opts-group-menu li:first').addClass('active');
	
	}else{
		
		tabid = jQuery('#last_tab').val();
		jQuery('#'+tabid+'_section_group').slideDown('fast');
		jQuery('#'+tabid+'_section_group_li').addClass('active');
		
	}
	
	
	jQuery('input[name="'+topdeal_opts.opt_name+'[defaults]"]').click(function(){
		if(!confirm(topdeal_opts.reset_confirm)){
			return false;
		}
	});
	
	jQuery('.topdeal-opts-group-tab-link-a').click(function(){
		relid = jQuery(this).attr('data-rel');
		
		jQuery('#last_tab').val(relid);
		
		jQuery('.topdeal-opts-group-tab').each(function(){
			if(jQuery(this).attr('id') == relid+'_section_group'){
				jQuery(this).show();
			}else{
				jQuery(this).hide();
			}
			
		});
		
		jQuery('.topdeal-opts-group-tab-link-li').each(function(){
				if(jQuery(this).attr('id') != relid+'_section_group_li' && jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
				}
				if(jQuery(this).attr('id') == relid+'_section_group_li'){
					jQuery(this).addClass('active');
				}
		});
	});
	
	
	
	
	if(jQuery('#topdeal-opts-save').is(':visible')){
		jQuery('#topdeal-opts-save').delay(4000).slideUp('slow');
	}
	
	if(jQuery('#topdeal-opts-imported').is(':visible')){
		jQuery('#topdeal-opts-imported').delay(4000).slideUp('slow');
	}	
	
	jQuery('input, textarea, select').change(function(){
		jQuery('#topdeal-opts-save-warn').slideDown('slow');
	});
	
	
	jQuery('#topdeal-opts-import-code-button').click(function(){
		if(jQuery('#topdeal-opts-import-link-wrapper').is(':visible')){
			jQuery('#topdeal-opts-import-link-wrapper').fadeOut('fast');
			jQuery('#import-link-value').val('');
		}
		jQuery('#topdeal-opts-import-code-wrapper').fadeIn('slow');
	});
	
	jQuery('#topdeal-opts-import-link-button').click(function(){
		if(jQuery('#topdeal-opts-import-code-wrapper').is(':visible')){
			jQuery('#topdeal-opts-import-code-wrapper').fadeOut('fast');
			jQuery('#import-code-value').val('');
		}
		jQuery('#topdeal-opts-import-link-wrapper').fadeIn('slow');
	});
	
	
	
	
	jQuery('#topdeal-opts-export-code-copy').click(function(){
		if(jQuery('#topdeal-opts-export-link-value').is(':visible')){jQuery('#topdeal-opts-export-link-value').fadeOut('slow');}
		jQuery('#topdeal-opts-export-code').toggle('fade');
	});
	
	jQuery('#topdeal-opts-export-link').click(function(){
		if(jQuery('#topdeal-opts-export-code').is(':visible')){jQuery('#topdeal-opts-export-code').fadeOut('slow');}
		jQuery('#topdeal-opts-export-link-value').toggle('fade');
	});
	
	

	
	
	
});