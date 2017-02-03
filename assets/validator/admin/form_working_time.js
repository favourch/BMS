/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_working_time").submit(function() {
        
        //EffectiveFrom
        var effectiveFrom = jQuery('#txtEffectiveFrom').val();
        if ((effectiveFrom == "") || (effectiveFrom == emptyerror)) {
            jQuery('#txtEffectiveFrom').addClass("form_error");
            jQuery('#txtEffectiveFrom').val(emptyerror);
        } else {
            jQuery('#txtEffectiveFrom').removeClass("form_error");
        }
        
        
        //Is-Active-Currently
        var isActiveCurrently = jQuery('#cmbIsActiveCurrently').val();
        if ((isActiveCurrently == "") || (isActiveCurrently == emptyerror)) {
            jQuery('#cmbIsActiveCurrently').addClass("form_error");
            jQuery('#cmbIsActiveCurrently').val(emptyerror);
        } else {
            jQuery('#cmbIsActiveCurrently').removeClass("form_error");
        }
        
        
        
        if (jQuery(":input").hasClass("form_error")) {
            validationErrorMsg();
            return false;
        } else {
            return true;
        }
        
        
        
    });
    
     // Clears any fields in the form when the user clicks on them
    jQuery(":input").focus(function() {
        if (jQuery(this).hasClass("form_error")) {
            jQuery(this).val("");
            jQuery(this).removeClass("form_error");
        }
			
    });
    
});

