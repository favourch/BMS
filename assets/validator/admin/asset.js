/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_asset").submit(function() {
        
        //Asset Type
        var assetType = jQuery('#txtAssetType').val();
        if ((assetType == "") || (assetType == emptyerror)) {
            jQuery('#txtAssetType').addClass("form_error");
            jQuery('#txtAssetType').val(emptyerror);
        } else {
            jQuery('#txtAssetType').removeClass("form_error");
        }
        
        
         //Asset Category...
        var assetTCategory = jQuery('#txtCategory').val();
        if ((assetTCategory == "") || (assetTCategory == emptyerror)) {
            jQuery('#txtCategory').addClass("form_error");
            jQuery('#txtCategory').val(emptyerror);
        } else {
            jQuery('#txtCategory').removeClass("form_error");
        }
        
        
        //Asset Date Acquired...
        var dateAcquired = jQuery('#txtDateAcquired').val();
        if ((dateAcquired == "") || (dateAcquired == emptyerror)) {
            jQuery('#txtDateAcquired').addClass("form_error");
            jQuery('#txtDateAcquired').val(emptyerror);
        } else {
            jQuery('#txtDateAcquired').removeClass("form_error");
        }
        
        
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
        
        //Purchased Date
        var purchasedDate = jQuery('#txtPurchasedDate').val();
        if ((purchasedDate == "") || (purchasedDate == emptyerror)) {
            jQuery('#txtPurchasedDate').addClass("form_error");
            jQuery('#txtPurchasedDate').val(emptyerror);
        } else {
            jQuery('#txtPurchasedDate').removeClass("form_error");
        }


//Purchased From
var purchasedFrom = jQuery('#txtPurchasedFrom').val();
        if ((purchasedFrom == "") || (purchasedFrom == emptyerror)) {
            jQuery('#txtPurchasedFrom').addClass("form_error");
            jQuery('#txtPurchasedFrom').val(emptyerror);
        } else {
            jQuery('#txtPurchasedFrom').removeClass("form_error");
        }

//Cost
var itemCost = jQuery('#txtCost').val();
        if ((itemCost == "") || (itemCost == emptyerror)) {
            jQuery('#txtCost').addClass("form_error");
            jQuery('#txtCost').val(emptyerror);
        } else {
            jQuery('#txtCost').removeClass("form_error");
        }



//Status
var itemStatus = jQuery('#txtStatus').val();
        if ((itemStatus == "") || (itemStatus == emptyerror)) {
            jQuery('#txtStatus').addClass("form_error");
            jQuery('#txtStatus').val(emptyerror);
        } else {
            jQuery('#txtStatus').removeClass("form_error");
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

