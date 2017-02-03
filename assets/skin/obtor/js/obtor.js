$("#form-data-back").click(function()
{
    parent.history.back();
    return false;
}
);

$(document).on("click", ".form-data-delete", function(e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");
    bootbox.confirm("Are you sure?", function(result) {
        if (result == true) {
            $(location).attr('href', targetUrl);
        }
    });
    return false;
});


jQuery(document).on('change', '#country', function() {
    var countyId = jQuery(this).val();
    jQuery("#region_box").load("/admin/ajex/load-region/?countryId=" + countyId);
});

jQuery(document).on('change', '#region', function() {
    var regionId = jQuery(this).val();
    jQuery("#branch_box").load("/admin/ajex/load-branch/?regionId=" + regionId);
});

jQuery(document).on('change', '#branch', function() {
    var branchId = jQuery(this).val();
    jQuery("#department_box").load("/admin/ajex/load-department/?branchId=" + branchId);
});

// load models for category...
jQuery(document).on('change', '#txtCategory', function() {
    var categoryId = jQuery(this).val();
    jQuery("#model").load("/admin/ajex/load-model/?categoryId=" + categoryId);
});



jQuery('#obtor_data_privilages').tree({});

jQuery(document).on('change', '#txtDataPrivilege', function() {
    var selectedValue = jQuery(this).val();
    if(selectedValue == 6){
        jQuery(".manul_selection").show();
    } else {
        jQuery(".manul_selection").hide();
    }
});


function inquireFollowUp(url) {
    var data = $("#form_inquire_followup").serializeArray();

   var promise = $.ajax({
     type: 'post',
     data: data,
     url: url
   })
   .done(function (responseData, status, xhr) {
       // preconfigured logic for success
       //alert(responseData);
       location.reload(true);
   })
   .fail(function (xhr, status, err) {
      //predetermined logic for unsuccessful request
       //alert(status);
   });

   return promise;
}

// starts attendance commands....

function exportAttendanceDate(attendanceDate) {

    if(attendanceDate != ""){
        var url = "/admin/attendance/import/";
        $("#single_command_progres").show();
            var promise = $.ajax({
              type: 'post',
              data: { dateOn: attendanceDate},
              url: url
            })
            .done(function (responseData, status, xhr) {
                // preconfigured logic for success
                $("#single_command_progres").hide();
            })
            .fail(function (xhr, status, err) {
               //predetermined logic for unsuccessful request
                //alert(status);
            });
   
    }
    
   
   

   return false;
}


function quickExportAttendance(attendanceDate) {
    
        var url = "/admin/attendance/import/";
        $("#quick_single_command_progres").show();
            var promise = $.ajax({
              type: 'post',
              data: { dateOn: attendanceDate},
              url: url
            })
            .done(function (responseData, status, xhr) {
                // preconfigured logic for success
                $("#quick_single_command_progres").hide();
            })
            .fail(function (xhr, status, err) {
               //predetermined logic for unsuccessful request
                //alert(status);
            });
   return false;
}

// ends attendance commends ....


// salary payment...
function paySalaryNow(salaryId) {
    
        var url = "/admin/payroll/pay-now/";
        var selectedLinkId = "#payLink"+salaryId;
            var promise = $.ajax({
              type: 'post',
              data: { salaryId: salaryId},
              url: url
            })
            .done(function (responseData, status, xhr) {
                // preconfigured logic for success
               $(selectedLinkId).hide();
            })
            .fail(function (xhr, status, err) {
               //predetermined logic for unsuccessful request
                //alert(status);
            });
   return false;
}