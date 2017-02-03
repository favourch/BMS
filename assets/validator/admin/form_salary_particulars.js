/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_salary_particulars").submit(function() {        
        //Salary Type
        var salaryType = jQuery('#cmbSalaryType').val();
        if ((salaryType == "") || (salaryType == emptyerror)) {
            jQuery('#cmbSalaryType').addClass("form_error");
            jQuery('#cmbSalaryType').val(emptyerror);
        } else {
            jQuery('#cmbSalaryType').removeClass("form_error");
        }
    
    
        //Salary-Amount
        var salaryAmount = jQuery('#txtSalaryAmount').val();
        if ((salaryAmount == "") || (salaryAmount == emptyerror)) {
            jQuery('#txtSalaryAmount').addClass("form_error");
            jQuery('#txtSalaryAmount').val(emptyerror);
        } else {
            jQuery('#txtSalaryAmount').removeClass("form_error");
        }
        
        
         //Effective From
        var effectiveFrom = jQuery('#txtEffectiveFrom').val();
        if ((effectiveFrom == "") || (effectiveFrom == emptyerror)) {
            jQuery('#txtEffectiveFrom').addClass("form_error");
            jQuery('#txtEffectiveFrom').val(emptyerror);
        } else {
            jQuery('#txtEffectiveFrom').removeClass("form_error");
        }
        
         //Remarks
        var remarks = jQuery('#txtRemarks').val();
        if ((remarks == "") || (remarks == emptyerror)) {
            jQuery('#txtRemarks').addClass("form_error");
            jQuery('#txtRemarks').val(emptyerror);
        } else {
            jQuery('#txtRemarks').removeClass("form_error");
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

