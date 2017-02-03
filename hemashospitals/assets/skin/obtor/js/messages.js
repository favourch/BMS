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