/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_toDoList").submit(function() {        
        //Country Name
        var listTitle = jQuery('#txtTitle').val();
        if ((listTitle == "") || (listTitle == emptyerror)) {
            jQuery('#txtTitle').addClass("form_error");
            jQuery('#txtTitle').val(emptyerror);
        } else {
            jQuery('#txtTitle').removeClass("form_error");
        }
        
         var listDescription = jQuery('#txtDescription').val();
        if ((listDescription == "") || (listDescription == emptyerror)) {
            jQuery('#txtDescription').addClass("form_error");
            jQuery('#txtDescription').val(emptyerror);
        } else {
            jQuery('#txtDescription').removeClass("form_error");
        }
        
        
        var listReminderOn = jQuery('#cmbReminderOn').val();
        if ((listReminderOn == "") || (listReminderOn == emptyerror)) {
            jQuery('#cmbReminderOn').addClass("form_error");
            jQuery('#cmbReminderOn').val(emptyerror);
        } else {
            jQuery('#cmbReminderOn').removeClass("form_error");
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

