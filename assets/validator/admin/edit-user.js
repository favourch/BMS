/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_user").submit(function() {
        
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
        
        //Department Name
        var departmentName = jQuery('#txtDepartmentName').val();
        if ((departmentName == "") || (departmentName == emptyerror)) {
            jQuery('#txtDepartmentName').addClass("form_error");
            jQuery('#txtDepartmentName').val(emptyerror);
        } else {
            jQuery('#txtDepartmentName').removeClass("form_error");
        }
        
        
        
        //Full Name
        var fullName = jQuery('#txtFullName').val();
        if ((fullName == "") || (fullName == emptyerror)) {
            jQuery('#txtFullName').addClass("form_error");
            jQuery('#txtFullName').val(emptyerror);
        } else {
            jQuery('#txtFullName').removeClass("form_error");
        }
        
        
         //Email Address
        var userEmail = jQuery('#txtUserEmail').val();
        if ((userEmail == "") || (userEmail == emptyerror)) {
            jQuery('#txtUserEmail').addClass("form_error");
            jQuery('#txtUserEmail').val(emptyerror);
        } else {
            jQuery('#txtUserEmail').removeClass("form_error");
        }
       
       
       //Display Name
        var displayName = jQuery('#txtDisplayName').val();
        if ((displayName == "") || (displayName == emptyerror)) {
            jQuery('#txtDisplayName').addClass("form_error");
            jQuery('#txtDisplayName').val(emptyerror);
        } else {
            jQuery('#txtDisplayName').removeClass("form_error");
        }
        
        //Status
        var userStatus = jQuery('#txtUserStatus').val();
        if ((userStatus == "") || (userStatus == emptyerror)) {
            jQuery('#txtUserStatus').addClass("form_error");
            jQuery('#txtUserStatus').val(emptyerror);
        } else {
            jQuery('#txtUserStatus').removeClass("form_error");
        }
        
        
        //Username
        var userName = jQuery('#txtUsername').val();
        if ((userName == "") || (userName == emptyerror)) {
            jQuery('#txtUsername').addClass("form_error");
            jQuery('#txtUsername').val(emptyerror);
        } else {
            jQuery('#txtUsername').removeClass("form_error");
        }
        
        
        
        
        //Confirm User password
        var userRole = jQuery('#txtUserRole').val();
        if ((userRole == "") || (userRole == emptyerror)) {
            jQuery('#txtUserRole').addClass("form_error");
            jQuery('#txtUserRole').val(emptyerror);
        } else {
            jQuery('#txtUserRole').removeClass("form_error");
        }
        
        //dataPrivilege
        var dataPrivilege = jQuery('#txtDataPrivilege').val();
        if ((dataPrivilege == "") || (dataPrivilege == emptyerror)) {
            jQuery('#txtDataPrivilege').addClass("form_error");
            jQuery('#txtDataPrivilege').val(emptyerror);
        } else {
            jQuery('#txtDataPrivilege').removeClass("form_error");
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



