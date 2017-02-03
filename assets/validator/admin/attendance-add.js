/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_attendance").submit(function() {        
        //employee number
        var employee = jQuery('#employee').val();
        if ((employee == "") || (employee == emptyerror)) {
            jQuery('#employee').addClass("form_error");
            jQuery('#employee').val(emptyerror);
        } else {
            jQuery('#employee').removeClass("form_error");
        }
        
        
        //Date On
        var dateOn = jQuery('#txtDateOn').val();
        if ((dateOn == "") || (dateOn == emptyerror)) {
            jQuery('#txtDateOn').addClass("form_error");
            jQuery('#txtDateOn').val(emptyerror);
        } else {
            jQuery('#txtDateOn').removeClass("form_error");
        }
        
        //In-Time
        var inTimeHr = jQuery('#cmbAttInTimeHr').val();
        if ((inTimeHr == "") || (inTimeHr == emptyerror)) {
            jQuery('#cmbAttInTimeHr').addClass("form_error");
            jQuery('#cmbAttInTimeHr').val(emptyerror);
        } else {
            jQuery('#cmbAttInTimeHr').removeClass("form_error");
        }
        
        
        var inTimeMin = jQuery('#cmbAttInTimeMin').val();
        if ((inTimeMin == "") || (inTimeMin == emptyerror)) {
            jQuery('#cmbAttInTimeMin').addClass("form_error");
            jQuery('#cmbAttInTimeMin').val(emptyerror);
        } else {
            jQuery('#cmbAttInTimeMin').removeClass("form_error");
        }
        
        
        
        
        //Out-Time
        var outTimeHr = jQuery('#cmbAttOutTimeHr').val();
        if ((outTimeHr == "") || (outTimeHr == emptyerror)) {
            jQuery('#cmbAttOutTimeHr').addClass("form_error");
            jQuery('#cmbAttOutTimeHr').val(emptyerror);
        } else {
            jQuery('#cmbAttOutTimeHr').removeClass("form_error");
        }
        
        
         var outTimeMin = jQuery('#cmbAttOutTimeMin').val();
        if ((outTimeMin == "") || (outTimeMin == emptyerror)) {
            jQuery('#cmbAttOutTimeMin').addClass("form_error");
            jQuery('#cmbAttOutTimeMin').val(emptyerror);
        } else {
            jQuery('#cmbAttOutTimeMin').removeClass("form_error");
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

