/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_staff").submit(function() {
        
        //employeeNumber
        var employeeNumber = jQuery('#txtEmployeeNumber').val();
        if ((employeeNumber == "") || (employeeNumber == emptyerror)) {
            jQuery('#txtEmployeeNumber').addClass("form_error");
            jQuery('#txtEmployeeNumber').val(emptyerror);
        } else {
            jQuery('#txtEmployeeNumber').removeClass("form_error");
        }
        
        
        
        //Full Name
        var fullName = jQuery('#txtFullName').val();
        if ((fullName == "") || (fullName == emptyerror)) {
            jQuery('#txtFullName').addClass("form_error");
            jQuery('#txtFullName').val(emptyerror);
        } else {
            jQuery('#txtFullName').removeClass("form_error");
        }
        
        
        //Name with initials
        var nameWithInitials = jQuery('#txtNameWithInitials').val();
        if ((nameWithInitials == "") || (nameWithInitials == emptyerror)) {
            jQuery('#txtNameWithInitials').addClass("form_error");
            jQuery('#txtNameWithInitials').val(emptyerror);
        } else {
            jQuery('#txtNameWithInitials').removeClass("form_error");
        }
        
        
        //Gender
        var gender = jQuery('#cmbGender').val();
        if ((gender == "") || (gender == emptyerror)) {
            jQuery('#cmbGender').addClass("form_error");
            jQuery('#cmbGender').val(emptyerror);
        } else {
            jQuery('#cmbGender').removeClass("form_error");
        }
        
        
        
        //Date Of Birth
        var dateOfBirth = jQuery('#txtDateOfBirth').val();
        if ((dateOfBirth == "") || (dateOfBirth == emptyerror)) {
            jQuery('#txtDateOfBirth').addClass("form_error");
            jQuery('#txtDateOfBirth').val(emptyerror);
        } else {
            jQuery('#txtDateOfBirth').removeClass("form_error");
        }
        
        
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
        var branchName = jQuery('#branch').val();
        if ((branchName == "") || (branchName == emptyerror)) {
            jQuery('#branch').addClass("form_error");
            jQuery('#branch').val(emptyerror);
        } else {
            jQuery('#branch').removeClass("form_error");
        }
        
        //Department Name
        var departmentName = jQuery('#department').val();
        if ((departmentName == "") || (departmentName == emptyerror)) {
            jQuery('#department').addClass("form_error");
            jQuery('#department').val(emptyerror);
        } else {
            jQuery('#department').removeClass("form_error");
        }
        
        
        //Joined Date
        var joinedDate = jQuery('#txtEmployeeJoinedDate').val();
        if ((joinedDate == "") || (joinedDate == emptyerror)) {
            jQuery('#txtEmployeeJoinedDate').addClass("form_error");
            jQuery('#txtEmployeeJoinedDate').val(emptyerror);
        } else {
            jQuery('#txtEmployeeJoinedDate').removeClass("form_error");
        }


//Designation
        var designation = jQuery('#txtEmployeeDesignation').val();
        if ((designation == "") || (designation == emptyerror)) {
            jQuery('#txtEmployeeDesignation').addClass("form_error");
            jQuery('#txtEmployeeDesignation').val(emptyerror);
        } else {
            jQuery('#txtEmployeeDesignation').removeClass("form_error");
        }


//Contract Status
        var contractStatus = jQuery('#cmbContractStatus').val();
        if ((contractStatus == "") || (contractStatus == emptyerror)) {
            jQuery('#cmbContractStatus').addClass("form_error");
            jQuery('#cmbContractStatus').val(emptyerror);
        } else {
            jQuery('#cmbContractStatus').removeClass("form_error");
        }


//Employee Type
        var employeeType = jQuery('#cmbEmployeeType').val();
        if ((employeeType == "") || (employeeType == emptyerror)) {
            jQuery('#cmbEmployeeType').addClass("form_error");
            jQuery('#cmbEmployeeType').val(emptyerror);
        } else {
            jQuery('#cmbEmployeeType').removeClass("form_error");
        }


//Employee Status
        var employeeStatus = jQuery('#cmbEmployeeStatus').val();
        if ((employeeStatus == "") || (employeeStatus == emptyerror)) {
            jQuery('#cmbEmployeeStatus').addClass("form_error");
            jQuery('#cmbEmployeeStatus').val(emptyerror);
        } else {
            jQuery('#cmbEmployeeStatus').removeClass("form_error");
        }


//Permanent Address
        var permanentAddress = jQuery('#txtEmployeeAddress').val();
        if ((permanentAddress == "") || (permanentAddress == emptyerror)) {
            jQuery('#txtEmployeeAddress').addClass("form_error");
            jQuery('#txtEmployeeAddress').val(emptyerror);
        } else {
            jQuery('#txtEmployeeAddress').removeClass("form_error");
        }


//Permanent Address Street
        var permanentAddressStreet = jQuery('#txtEmployeeAddressStreet').val();
        if ((permanentAddressStreet == "") || (permanentAddressStreet == emptyerror)) {
            jQuery('#txtEmployeeAddressStreet').addClass("form_error");
            jQuery('#txtEmployeeAddressStreet').val(emptyerror);
        } else {
            jQuery('#txtEmployeeAddressStreet').removeClass("form_error");
        }

//Permanent Address City
        var permanentAddressCity = jQuery('#txtEmployeeAddressCity').val();
        if ((permanentAddressCity == "") || (permanentAddressCity == emptyerror)) {
            jQuery('#txtEmployeeAddressCity').addClass("form_error");
            jQuery('#txtEmployeeAddressCity').val(emptyerror);
        } else {
            jQuery('#txtEmployeeAddressCity').removeClass("form_error");
        }

//Permanent Address State
        var permanentAddressState = jQuery('#txtEmployeeAddressState').val();
        if ((permanentAddressState == "") || (permanentAddressState == emptyerror)) {
            jQuery('#txtEmployeeAddressState').addClass("form_error");
            jQuery('#txtEmployeeAddressState').val(emptyerror);
        } else {
            jQuery('#txtEmployeeAddressState').removeClass("form_error");
        }


//Permanent Address Postal Code
        var permanentAddressPostalCode = jQuery('#txtEmployeeAddressZip').val();
        if ((permanentAddressPostalCode == "") || (permanentAddressPostalCode == emptyerror)) {
            jQuery('#txtEmployeeAddressZip').addClass("form_error");
            jQuery('#txtEmployeeAddressZip').val(emptyerror);
        } else {
            jQuery('#txtEmployeeAddressZip').removeClass("form_error");
        }


//Permanent Address Country
        var permanentAddressCountry = jQuery('#txtEmployeeAddressCountry').val();
        if ((permanentAddressCountry == "") || (permanentAddressCountry == emptyerror)) {
            jQuery('#txtEmployeeAddressCountry').addClass("form_error");
            jQuery('#txtEmployeeAddressCountry').val(emptyerror);
        } else {
            jQuery('#txtEmployeeAddressCountry').removeClass("form_error");
        }


//Residential Address
        var residentialAddress = jQuery('#txtEmployeeResidentialAddress').val();
        if ((residentialAddress == "") || (residentialAddress == emptyerror)) {
            jQuery('#txtEmployeeResidentialAddress').addClass("form_error");
            jQuery('#txtEmployeeResidentialAddress').val(emptyerror);
        } else {
            jQuery('#txtEmployeeResidentialAddress').removeClass("form_error");
        }


//Residential Address Street
        var residentialAddressStreet = jQuery('#txtEmployeeResidentialAddressStreet').val();
        if ((residentialAddressStreet == "") || (residentialAddressStreet == emptyerror)) {
            jQuery('#txtEmployeeResidentialAddressStreet').addClass("form_error");
            jQuery('#txtEmployeeResidentialAddressStreet').val(emptyerror);
        } else {
            jQuery('#txtEmployeeResidentialAddressStreet').removeClass("form_error");
        }

//Residential Address City
        var residentialAddressCity = jQuery('#txtEmployeeResidentialAddressCity').val();
        if ((residentialAddressCity == "") || (residentialAddressCity == emptyerror)) {
            jQuery('#txtEmployeeResidentialAddressCity').addClass("form_error");
            jQuery('#txtEmployeeResidentialAddressCity').val(emptyerror);
        } else {
            jQuery('#txtEmployeeResidentialAddressCity').removeClass("form_error");
        }

//Residential Address State
        var residentialAddressState = jQuery('#txtEmployeeResidentialAddressState').val();
        if ((residentialAddressState == "") || (residentialAddressState == emptyerror)) {
            jQuery('#txtEmployeeResidentialAddressState').addClass("form_error");
            jQuery('#txtEmployeeResidentialAddressState').val(emptyerror);
        } else {
            jQuery('#txtEmployeeResidentialAddressState').removeClass("form_error");
        }


//Residential Address Postal Code
        var residentialAddressPostalCode = jQuery('#txtEmployeeResidentialAddressZip').val();
        if ((residentialAddressPostalCode == "") || (residentialAddressPostalCode == emptyerror)) {
            jQuery('#txtEmployeeResidentialAddressZip').addClass("form_error");
            jQuery('#txtEmployeeResidentialAddressZip').val(emptyerror);
        } else {
            jQuery('#txtEmployeeResidentialAddressZip').removeClass("form_error");
        }


//Residential Address Country
        var residentialAddressCountry = jQuery('#txtEmployeeResidentialAddressCountry').val();
        if ((residentialAddressCountry == "") || (residentialAddressCountry == emptyerror)) {
            jQuery('#txtEmployeeResidentialAddressCountry').addClass("form_error");
            jQuery('#txtEmployeeResidentialAddressCountry').val(emptyerror);
        } else {
            jQuery('#txtEmployeeResidentialAddressCountry').removeClass("form_error");
        }


//Emergency Contact Address
        var emergencyContactAddress = jQuery('#txtEmergencyContactAddress').val();
        if ((emergencyContactAddress == "") || (emergencyContactAddress == emptyerror)) {
            jQuery('#txtEmergencyContactAddress').addClass("form_error");
            jQuery('#txtEmergencyContactAddress').val(emptyerror);
        } else {
            jQuery('#txtEmergencyContactAddress').removeClass("form_error");
        }


//Emergency Contact Address Street
        var emergencyContactAddressStreet = jQuery('#txtEmergencyContactAddressStreet').val();
        if ((emergencyContactAddressStreet == "") || (emergencyContactAddressStreet == emptyerror)) {
            jQuery('#txtEmergencyContactAddressStreet').addClass("form_error");
            jQuery('#txtEmergencyContactAddressStreet').val(emptyerror);
        } else {
            jQuery('#txtEmergencyContactAddressStreet').removeClass("form_error");
        }

//Emergency Contact Address City
        var emergencyContactAddressCity = jQuery('#txtEmergencyContactAddressCity').val();
        if ((emergencyContactAddressCity == "") || (emergencyContactAddressCity == emptyerror)) {
            jQuery('#txtEmergencyContactAddressCity').addClass("form_error");
            jQuery('#txtEmergencyContactAddressCity').val(emptyerror);
        } else {
            jQuery('#txtEmergencyContactAddressCity').removeClass("form_error");
        }

//Emergency Contact Address State
        var emergencyContactAddressState = jQuery('#txtEmergencyContactAddressState').val();
        if ((emergencyContactAddressState == "") || (emergencyContactAddressState == emptyerror)) {
            jQuery('#txtEmergencyContactAddressState').addClass("form_error");
            jQuery('#txtEmergencyContactAddressState').val(emptyerror);
        } else {
            jQuery('#txtEmergencyContactAddressState').removeClass("form_error");
        }


//Emergency Contact Address Postal Code
        var emergencyContactAddressPostalCode = jQuery('#txtEmergencyContactAddressZipPostalCode').val();
        if ((emergencyContactAddressPostalCode == "") || (emergencyContactAddressPostalCode == emptyerror)) {
            jQuery('#txtEmergencyContactAddressZipPostalCode').addClass("form_error");
            jQuery('#txtEmergencyContactAddressZipPostalCode').val(emptyerror);
        } else {
            jQuery('#txtEmergencyContactAddressZipPostalCode').removeClass("form_error");
        }


//Emergency Contact Address Country
        var emergencyContactAddressCountry = jQuery('#txtEmergencyContactAddressCountry').val();
        if ((emergencyContactAddressCountry == "") || (emergencyContactAddressCountry == emptyerror)) {
            jQuery('#txtEmergencyContactAddressCountry').addClass("form_error");
            jQuery('#txtEmergencyContactAddressCountry').val(emptyerror);
        } else {
            jQuery('#txtEmergencyContactAddressCountry').removeClass("form_error");
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

