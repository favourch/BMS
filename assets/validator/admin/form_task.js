/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    // The text to show up within a field when it is incorrect
    emptyerror = "This field is required.";
    
    jQuery("#form_task").submit(function() {
        
        //Task Name
        var taskName = jQuery('#txtName').val();
        if ((taskName == "") || (taskName == emptyerror)) {
            jQuery('#txtName').addClass("form_error");
            jQuery('#txtName').val(emptyerror);
        } else {
            jQuery('#txtName').removeClass("form_error");
        }
        
        //txtProjectId
        var projectId = jQuery('#txtProjectId').val();
        if ((projectId == "") || (projectId == emptyerror)) {
            jQuery('#txtProjectId').addClass("form_error");
            jQuery('#txtProjectId').val(emptyerror);
        } else {
            jQuery('#txtProjectId').removeClass("form_error");
        }
        
        //txtAssignedTo
        var assignedTo = jQuery('#txtAssignedTo').val();
        if ((assignedTo == "") || (assignedTo == emptyerror)) {
            jQuery('#txtAssignedTo').addClass("form_error");
            jQuery('#txtAssignedTo').val(emptyerror);
        } else {
            jQuery('#txtAssignedTo').removeClass("form_error");
        }
        
        //txtCurrentStatus
        var currentStatus = jQuery('#txtCurrentStatus').val();
        if ((currentStatus == "") || (currentStatus == emptyerror)) {
            jQuery('#txtCurrentStatus').addClass("form_error");
            jQuery('#txtCurrentStatus').val(emptyerror);
        } else {
            jQuery('#txtCurrentStatus').removeClass("form_error");
        }
        
         //txtTaskType
        var taskType = jQuery('#txtTaskType').val();
        if ((taskType == "") || (taskType == emptyerror)) {
            jQuery('#txtTaskType').addClass("form_error");
            jQuery('#txtTaskType').val(emptyerror);
        } else {
            jQuery('#txtTaskType').removeClass("form_error");
        }
        
        //txtPriority
        var taskPriority = jQuery('#txtPriority').val();
        if ((taskPriority == "") || (taskPriority == emptyerror)) {
            jQuery('#txtPriority').addClass("form_error");
            jQuery('#txtPriority').val(emptyerror);
        } else {
            jQuery('#txtPriority').removeClass("form_error");
        }
        
        
              //txtDescription
        var taskDescription = jQuery('#txtDescription').val();
        if ((taskDescription == "") || (taskDescription == emptyerror)) {
            jQuery('#txtDescription').addClass("form_error");
            jQuery('#txtDescription').val(emptyerror);
        } else {
            jQuery('#txtDescription').removeClass("form_error");
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

