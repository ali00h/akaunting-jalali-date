
function timeConverter(UNIX_timestamp){
    var a = new Date(UNIX_timestamp);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var year = a.getFullYear();
    var month = a.getMonth() + 1;
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();
    //var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
    var time = year + '-' + month + '-' + date;
    return time;
}
function flatpickrFinderForPDP() {
    console.log("flatpickrFinderForPDP started!");
    $(".flatpickr-input").each(function () {
        let datepicker_classes = $(this).parent().parent().attr('class').split(" ");
        let datepicker_class = "";
        for (let i = 0; i < datepicker_classes.length; i++) {
            if (datepicker_classes[i].startsWith('cpdp')) {
                datepicker_class = datepicker_classes[i].replace("cpdp", "");
            }
        }

        //console.log($(this).attr('class') + ":");
        //console.log(datepicker_class + ":");
        //console.log($(this).val());

        let pdpElementSelector = "#" + datepicker_class + "persianpicker";
        if ($(pdpElementSelector).length > 0 && !($(pdpElementSelector).hasClass("pwt-datepicker-input-element"))) {
            var pd = $(pdpElementSelector).persianDatepicker({
                format: 'YYYY/MM/DD',
                onSelect: function (unix) {
                    //console.log($(this)[0].model.input.model);
                    let elementId = $(this)[0].model.inputElement.id;
                    let datepickerId = elementId.replace("persianpicker", "");
                    let convertDate = timeConverter(unix);
                    //console.log('datepicker id : ' + datepickerId);
                    //console.log('datepicker select : ' + convertDate);
                    $(".cpdp" + datepickerId)[0].__vue__.$parent.real_model = convertDate;
                }
            });
            if ($(this).val() != "") {
                let timeInMillis = Date.parse($(this).val());
                //console.log(timeInMillis);
                pd.setDate(timeInMillis);
            }
        }


    });
}
$( document ).ready(function() {
    flatpickrFinderForPDP();
});


