/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_country").submit(function() {        
        //Country Name
        var countryName = jQuery('#txtJobTitleName').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#txtJobTitleName').addClass("form_error");
            jQuery('#txtJobTitleName').val(emptyerror);
        } else {
            jQuery('#txtJobTitleName').removeClass("form_error");
        }
        
        
        //Region Name
        var regionName = jQuery('#txtJobTitleCode').val();
        if ((regionName == "") || (regionName == emptyerror)) {
            jQuery('#txtJobTitleCode').addClass("form_error");
            jQuery('#txtJobTitleCode').val(emptyerror);
        } else {
            jQuery('#txtJobTitleCode').removeClass("form_error");
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
    
    jQuery("#form_category").submit(function() {        
        //Country Name
        var countryName = jQuery('#txtCategoryName').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#txtCategoryName').addClass("form_error");
            jQuery('#txtCategoryName').val(emptyerror);
        } else {
            jQuery('#txtCategoryName').removeClass("form_error");
        }
        
        
        //Region Name
        var regionName = jQuery('#txtCategoryCode').val();
        if ((regionName == "") || (regionName == emptyerror)) {
            jQuery('#txtCategoryCode').addClass("form_error");
            jQuery('#txtCategoryCode').val(emptyerror);
        } else {
            jQuery('#txtCategoryCode').removeClass("form_error");
        }
 
        
        if (jQuery(":input").hasClass("form_error")) {
            validationErrorMsg();
            return false;
        } else {
            return true;
        }
        
        
        
    });
   
    
    jQuery("#form_job_types").submit(function() {        
        //Country Name
        var countryName = jQuery('#txtTypeName').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#txtTypeName').addClass("form_error");
            jQuery('#txtTypeName').val(emptyerror);
        } else {
            jQuery('#txtTypeName').removeClass("form_error");
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

