/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_region").submit(function() {        
        //Country Name
        var countryName = jQuery('#txtCountry').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#txtCountry').addClass("form_error");
            jQuery('#txtCountry').val(emptyerror);
        } else {
            jQuery('#txtCountry').removeClass("form_error");
        }
        
        
        //Region Name
        var regionName = jQuery('#txtRegionName').val();
        if ((regionName == "") || (regionName == emptyerror)) {
            jQuery('#txtRegionName').addClass("form_error");
            jQuery('#txtRegionName').val(emptyerror);
        } else {
            jQuery('#txtRegionName').removeClass("form_error");
        }
        
        //Region Code
        var regionCode = jQuery('#txtRegionCode').val();
        if ((regionCode == "") || (regionCode == emptyerror)) {
            jQuery('#txtRegionCode').addClass("form_error");
            jQuery('#txtRegionCode').val(emptyerror);
        } else {
            jQuery('#txtRegionCode').removeClass("form_error");
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

