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


jQuery(document).on('change', '#txtCountry', function() {
    var countyId = jQuery(this).val();
    jQuery("#region").load("/admin/ajex/load-region/?countryId=" + countyId);
});

jQuery(document).on('change', '#txtRegion', function() {
    var regionId = jQuery(this).val();
    jQuery("#branch").load("/admin/ajex/load-branch/?regionId=" + regionId);
});

jQuery(document).on('change', '#txtBranchName', function() {
    var branchId = jQuery(this).val();
    jQuery("#department").load("/admin/ajex/load-department/?branchId=" + branchId);
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