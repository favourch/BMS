/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_branch").submit(function() {        
        //Country Name
        var countryName = jQuery('#country').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#country').addClass("form_error");
            jQuery('#country').val(emptyerror);
        } else {
            jQuery('#country').removeClass("form_error");
        }
        
        
        //Region Name
        var regionName = jQuery('#region').val();
        if ((regionName == "") || (regionName == emptyerror)) {
            jQuery('#region').addClass("form_error");
            jQuery('#region').val(emptyerror);
        } else {
            jQuery('#region').removeClass("form_error");
        }
        
        
        //Branch Name
        var branchName = jQuery('#branch_name').val();
        if ((branchName == "") || (branchName == emptyerror)) {
            jQuery('#branch_name').addClass("form_error");
            jQuery('#branch_name').val(emptyerror);
        } else {
            jQuery('#branch_name').removeClass("form_error");
        }
        
        //Branch Code
        var branchCode = jQuery('#txtBranchCode').val();
        if ((branchCode == "") || (branchCode == emptyerror)) {
            jQuery('#txtBranchCode').addClass("form_error");
            jQuery('#txtBranchCode').val(emptyerror);
        } else {
            jQuery('#txtBranchCode').removeClass("form_error");
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

