/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_vacancy").submit(function() {        
        //Country Name
        var countryName = jQuery('#txtJobTitle').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#txtJobTitle').addClass("form_error");
            jQuery('#txtJobTitle').val(emptyerror);
        } else {
            jQuery('#txtJobTitle').removeClass("form_error");
        }
        
        
        //Region Name
        var regionName = jQuery('#txtJobCategory').val();
        if ((regionName == "") || (regionName == emptyerror)) {
            jQuery('#txtJobCategory').addClass("form_error");
            jQuery('#txtJobCategory').val(emptyerror);
        } else {
            jQuery('#txtJobCategory').removeClass("form_error");
        }
        
        
        //Branch Name
        var branchName = jQuery('#txtCountry').val();
        if ((branchName == "") || (branchName == emptyerror)) {
            jQuery('#txtCountry').addClass("form_error");
            jQuery('#txtCountry').val(emptyerror);
        } else {
            jQuery('#txtCountry').removeClass("form_error");
        }
        
        //Branch Code
        var branchCode = jQuery('#txtRegion').val();
        if ((branchCode == "") || (branchCode == emptyerror)) {
            jQuery('#txtRegion').addClass("form_error");
            jQuery('#txtRegion').val(emptyerror);
        } else {
            jQuery('#txtRegion').removeClass("form_error");
        }
        
        
        //Branch Name
        var branch = jQuery('#txtBranchName').val();
        if ((branch == "") || (branch == emptyerror)) {
            jQuery('#txtBranchName').addClass("form_error");
            jQuery('#txtBranchName').val(emptyerror);
        } else {
            jQuery('#txtBranchName').removeClass("form_error");
        }
        
        
        //department
        var department = jQuery('#txtDepartmentName').val();
        if ((department == "") || (department == emptyerror)) {
            jQuery('#txtDepartmentName').addClass("form_error");
            jQuery('#txtDepartmentName').val(emptyerror);
        } else {
            jQuery('#txtDepartmentName').removeClass("form_error");
        }
        
        
        //publish Date
        var txtPublishStartDate = jQuery('#txtPublishStartDate').val();
        if ((txtPublishStartDate == "") || (txtPublishStartDate == emptyerror)) {
            jQuery('#txtPublishStartDate').addClass("form_error");
            jQuery('#txtPublishStartDate').val(emptyerror);
        } else {
            jQuery('#txtPublishStartDate').removeClass("form_error");
        }
        
        
        //publish End  Date
        var txtPublishEndtDate = jQuery('#txtPublishEnddate').val();
        if ((txtPublishEndtDate == "") || (txtPublishEndtDate == emptyerror)) {
            jQuery('#txtPublishEnddate').addClass("form_error");
            jQuery('#txtPublishEnddate').val(emptyerror);
        } else {
            jQuery('#txtPublishEnddate').removeClass("form_error");
        }
        
        
        //Vacancy-Qty
        var VacancyQty = jQuery('#txtQty').val();
        if ((VacancyQty == "") || (VacancyQty == emptyerror)) {
            jQuery('#txtQty').addClass("form_error");
            jQuery('#txtQty').val(emptyerror);
        } else {
            jQuery('#txtQty').removeClass("form_error");
        }
        
        //Vacancy-Qty
        var VacancyQty = jQuery('#txtQty').val();
        if ((VacancyQty == "") || (VacancyQty == emptyerror)) {
            jQuery('#txtQty').addClass("form_error");
            jQuery('#txtQty').val(emptyerror);
        } else {
            jQuery('#txtQty').removeClass("form_error");
        }
        
        
        //  Title
        var Title = jQuery('#txtVacancyTitle').val();
        if ((Title == "") || (Title == emptyerror)) {
            jQuery('#txtVacancyTitle').addClass("form_error");
            jQuery('#txtVacancyTitle').val(emptyerror);
        } else {
            jQuery('#txtVacancyTitle').removeClass("form_error");
        }
        
        
        //  Title
        var Title = jQuery('#txtVacancyTitle').val();
        if ((Title == "") || (Title == emptyerror)) {
            jQuery('#txtVacancyTitle').addClass("form_error");
            jQuery('#txtVacancyTitle').val(emptyerror);
        } else {
            jQuery('#txtVacancyTitle').removeClass("form_error");
        }
        
        //  Small-Description
        var SmallDescription = jQuery('#txtSmallDescription').val();
        if ((SmallDescription == "") || (SmallDescription == emptyerror)) {
            jQuery('#txtSmallDescription').addClass("form_error");
            jQuery('#txtSmallDescription').val(emptyerror);
        } else {
            jQuery('#txtSmallDescription').removeClass("form_error");
        }
        
        //  Detailed-Description
        var txtDetailedDescription = jQuery('#txtDetailedDescription').val();
        if ((txtDetailedDescription == "") || (txtDetailedDescription == emptyerror)) {
            jQuery('#txtDetailedDescription').addClass("form_error");
            jQuery('#txtDetailedDescription').val(emptyerror);
        } else {
            jQuery('#txtDetailedDescription').removeClass("form_error");
        }
        
        if (jQuery(":input").hasClass("form_error")) {
            validationErrorMsg();
            return false;
        } else {
            return true;
        }
        
        
        
    });
    
    
    
    jQuery("#form_test").submit(function() {        
        //Country Name
        var countryName = jQuery('#txtVacancy').val();
        if ((countryName == "") || (countryName == emptyerror)) {
            jQuery('#txtVacancy').addClass("form_error");
            jQuery('#txtVacancy').val(emptyerror);
        } else {
            jQuery('#txtVacancy').removeClass("form_error");
        }
        
        
        //Region Name
        var regionName = jQuery('#txtFullName').val();
        if ((regionName == "") || (regionName == emptyerror)) {
            jQuery('#txtFullName').addClass("form_error");
            jQuery('#txtFullName').val(emptyerror);
        } else {
            jQuery('#txtFullName').removeClass("form_error");
        }
        
        
        //Branch Name
        var branchName = jQuery('#txtNameWithIni').val();
        if ((branchName == "") || (branchName == emptyerror)) {
            jQuery('#txtNameWithIni').addClass("form_error");
            jQuery('#txtNameWithIni').val(emptyerror);
        } else {
            jQuery('#txtNameWithIni').removeClass("form_error");
        }
        
        //Branch Code
        var branchCode = jQuery('#txtEmailAddress').val();
        if ((branchCode == "") || (branchCode == emptyerror)) {
            jQuery('#txtEmailAddress').addClass("form_error");
            jQuery('#txtEmailAddress').val(emptyerror);
        } else {
            jQuery('#txtEmailAddress').removeClass("form_error");
        }
        
        
        //Branch Name
        var branch = jQuery('#txtTelephoneNumber').val();
        if ((branch == "") || (branch == emptyerror)) {
            jQuery('#txtTelephoneNumber').addClass("form_error");
            jQuery('#txtTelephoneNumber').val(emptyerror);
        } else {
            jQuery('#txtTelephoneNumber').removeClass("form_error");
        }
        
        
        //department
        var department = jQuery('#txtContactNumber').val();
        if ((department == "") || (department == emptyerror)) {
            jQuery('#txtContactNumber').addClass("form_error");
            jQuery('#txtContactNumber').val(emptyerror);
        } else {
            jQuery('#txtContactNumber').removeClass("form_error");
        }
        
        
        //publish Date
        var txtPublishStartDate = jQuery('#txtDateOfBirth').val();
        if ((txtPublishStartDate == "") || (txtPublishStartDate == emptyerror)) {
            jQuery('#txtDateOfBirth').addClass("form_error");
            jQuery('#txtDateOfBirth').val(emptyerror);
        } else {
            jQuery('#txtDateOfBirth').removeClass("form_error");
        }
        
        
        //publish End  Date
        var txtPublishEndtDate = jQuery('#txtGender').val();
        if ((txtPublishEndtDate == "") || (txtPublishEndtDate == emptyerror)) {
            jQuery('#txtGender').addClass("form_error");
            jQuery('#txtGender').val(emptyerror);
        } else {
            jQuery('#txtGender').removeClass("form_error");
        }
        
        
        //Vacancy-Qty
        var VacancyQty = jQuery('#txtPermanentAddressAddress').val();
        if ((VacancyQty == "") || (VacancyQty == emptyerror)) {
            jQuery('#txtPermanentAddressAddress').addClass("form_error");
            jQuery('#txtPermanentAddressAddress').val(emptyerror);
        } else {
            jQuery('#txtPermanentAddressAddress').removeClass("form_error");
        }
        
        //street
        var txtPermanentAddressStreet = jQuery('#txtPermanentAddressStreet').val();
        if ((txtPermanentAddressStreet == "") || (txtPermanentAddressStreet == emptyerror)) {
            jQuery('#txtPermanentAddressStreet').addClass("form_error");
            jQuery('#txtPermanentAddressStreet').val(emptyerror);
        } else {
            jQuery('#txtPermanentAddressStreet').removeClass("form_error");
        }
        
        
        //  Title
        var Title = jQuery('#txtPermanentAddressCity').val();
        if ((Title == "") || (Title == emptyerror)) {
            jQuery('#txtPermanentAddressCity').addClass("form_error");
            jQuery('#txtPermanentAddressCity').val(emptyerror);
        } else {
            jQuery('#txtPermanentAddressCity').removeClass("form_error");
        }
        
        
        //  Title
        var Title = jQuery('#txtPermanentAddressState').val();
        if ((Title == "") || (Title == emptyerror)) {
            jQuery('#txtPermanentAddressState').addClass("form_error");
            jQuery('#txtPermanentAddressState').val(emptyerror);
        } else {
            jQuery('#txtPermanentAddressState').removeClass("form_error");
        }
        
        //  Small-Description
        var SmallDescription = jQuery('#txtPermanentAddressZip').val();
        if ((SmallDescription == "") || (SmallDescription == emptyerror)) {
            jQuery('#txtPermanentAddressZip').addClass("form_error");
            jQuery('#txtPermanentAddressZip').val(emptyerror);
        } else {
            jQuery('#txtPermanentAddressZip').removeClass("form_error");
        }
        
        //  Detailed-Description
        var txtDetailedDescription = jQuery('#txtPermanentAddressCountry').val();
        if ((txtDetailedDescription == "") || (txtDetailedDescription == emptyerror)) {
            jQuery('#txtPermanentAddressCountry').addClass("form_error");
            jQuery('#txtPermanentAddressCountry').val(emptyerror);
        } else {
            jQuery('#txtPermanentAddressCountry').removeClass("form_error");
        }
        
        //  txtResidentialAddressAddress
        var txtResidentialAddressAddress = jQuery('#txtResidentialAddressAddress').val();
        if ((txtResidentialAddressAddress == "") || (txtResidentialAddressAddress == emptyerror)) {
            jQuery('#txtResidentialAddressAddress').addClass("form_error");
            jQuery('#txtResidentialAddressAddress').val(emptyerror);
        } else {
            jQuery('#txtResidentialAddressAddress').removeClass("form_error");
        }
        
        //  street
        var txtResidentialAddressStreet = jQuery('#txtResidentialAddressStreet').val();
        if ((txtResidentialAddressStreet == "") || (txtResidentialAddressStreet == emptyerror)) {
            jQuery('#txtResidentialAddressStreet').addClass("form_error");
            jQuery('#txtResidentialAddressStreet').val(emptyerror);
        } else {
            jQuery('#txtResidentialAddressStreet').removeClass("form_error");
        }
        
        //  txtResidentialAddressCity
        var txtResidentialAddressCity = jQuery('#txtResidentialAddressCity').val();
        if ((txtResidentialAddressCity == "") || (txtResidentialAddressCity == emptyerror)) {
            jQuery('#txtResidentialAddressCity').addClass("form_error");
            jQuery('#txtResidentialAddressCity').val(emptyerror);
        } else {
            jQuery('#txtResidentialAddressCity').removeClass("form_error");
        }
        
        //  txtResidentialAddressState
        var txtResidentialAddressState = jQuery('#txtResidentialAddressState').val();
        if ((txtResidentialAddressState == "") || (txtResidentialAddressState == emptyerror)) {
            jQuery('#txtResidentialAddressState').addClass("form_error");
            jQuery('#txtResidentialAddressState').val(emptyerror);
        } else {
            jQuery('#txtResidentialAddressState').removeClass("form_error");
        }
        
        //  txtResidentialAddressZip
        var txtResidentialAddressZip = jQuery('#txtResidentialAddressZip').val();
        if ((txtResidentialAddressZip == "") || (txtResidentialAddressZip == emptyerror)) {
            jQuery('#txtResidentialAddressZip').addClass("form_error");
            jQuery('#txtResidentialAddressZip').val(emptyerror);
        } else {
            jQuery('#txtResidentialAddressZip').removeClass("form_error");
        }
        
        //  txtResidentialAddressCountry
        var txtResidentialAddressCountry = jQuery('#txtResidentialAddressCountry').val();
        if ((txtResidentialAddressCountry == "") || (txtResidentialAddressCountry == emptyerror)) {
            jQuery('#txtResidentialAddressCountry').addClass("form_error");
            jQuery('#txtResidentialAddressCountry').val(emptyerror);
        } else {
            jQuery('#txtResidentialAddressCountry').removeClass("form_error");
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