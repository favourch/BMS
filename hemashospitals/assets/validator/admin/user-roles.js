/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_user_role").submit(function() {
        
        //Group Name
        var groupName = jQuery('#txtGroupName').val();
        if ((groupName == "") || (groupName == emptyerror)) {
            jQuery('#txtGroupName').addClass("form_error");
            jQuery('#txtGroupName').val(emptyerror);
        } else {
            jQuery('#txtGroupName').removeClass("form_error");
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

