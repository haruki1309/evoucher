
jQuery.validator.addMethod("aftercurrentdate", function(value, params, element) {
    var currentDate = new Date();
    currentDate.setHours(0,0,0,0);
    var dateMomentObject = moment(value, "DD/MM/YYYY");
    var selectedDate = dateMomentObject.toDate();

    if(selectedDate >= currentDate) {
        return true;
    }
    else {
        return false;
    }
}, "Bắt buộc chọn sau ngày hôm nay.");
