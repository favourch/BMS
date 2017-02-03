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
        var countryName = jQuery('#txtCountry').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#txtCountry').addClass("form_error");
            jQuery('#txtCountry').val(emptyerror);
        } else {
            jQuery('#txtCountry').removeClass("form_error");
        }
        
        
        //Region Name
        var regionName = jQuery('#txtRegion').val();
        if ((regionName == "") || (regionName == emptyerror)) {
            jQuery('#txtRegion').addClass("form_error");
            jQuery('#txtRegion').val(emptyerror);
        } else {
            jQuery('#txtRegion').removeClass("form_error");
        }
        
        
        //Branch Name
        var branchName = jQuery('#txtBranchName').val();
        if ((branchName == "") || (branchName == emptyerror)) {
            jQuery('#txtBranchName').addClass("form_error");
            jQuery('#txtBranchName').val(emptyerror);
        } else {
            jQuery('#txtBranchName').removeClass("form_error");
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

