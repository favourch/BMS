//https://codeload.github.com/naoxink/notifIt/zip/master
function saveSuccessMsg() {
    notif({
        msg: "The record has been saved successfully.",
        type: "success"
    });
}

function deleteSuccessMsg() {
    notif({
        msg: "The record has been deleted successfully.",
        type: "success"
    });
}

function updateErrorMsg() {
    notif({
        msg: "An error occurred while saving the record. Please try again...",
        type: "error"
    });
}

function deleteErrorMsg() {
    notif({
        msg: "An error occurred while deleting the record. Please try again...",
        type: "error"
    });
}

function informationMsg($messageText) {
    notif({
        msg: $messageText,
        type: "info"
    });
}

function warningMsg($messageText) {
    notif({
        msg: $messageText,
        type: "warning"
    });
}


function validationErrorMsg() {
    notif({
        msg: "Highlighted fields are required",
        type: "error"
    });
}

function fileUploadSuccessMsg() {
    notif({
        msg: "The file has been uploaded successfully",
        type: "success"
    });
}

function filesUploadSuccessMsg() {
    notif({
        msg: "Files have been uploaded successfully",
        type: "success"
    });
}


function salaryNotGeneratedForSelectedMonth() {
    notif({
        msg: "Salary not generated for selected month",
        type: "warning"
    });
}