/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_user").submit(function() {
        
  
      
        
        
        //User password
        var userPassword = jQuery('#txtUserPassword').val();
        if ((userPassword == "") || (userPassword == emptyerror)) {
            jQuery('#txtUserPassword').addClass("form_error");
            jQuery('#txtUserPassword').val(emptyerror);
        } else {
            jQuery('#txtUserPassword').removeClass("form_error");
        }
        
        
        //Confirm User password
        var confirmUserPassword = jQuery('#txtConfirmPassword').val();
        if ((confirmUserPassword == "") || (confirmUserPassword == emptyerror)) {
            jQuery('#txtConfirmPassword').addClass("form_error");
            jQuery('#txtConfirmPassword').val(emptyerror);
        } else {
            if ((confirmUserPassword != userPassword)) {
            jQuery('#txtConfirmPassword').addClass("form_error");
            jQuery('#txtConfirmPassword').val(emptyerror);
            } else {
                jQuery('#txtConfirmPassword').removeClass("form_error");
            }
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



