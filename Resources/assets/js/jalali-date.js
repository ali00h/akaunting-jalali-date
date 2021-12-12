$(document).ready(function() {
    $(".persian-date-picker").pDatepicker({
        initialValue: false,
        format: 'YYYY/MM/DD',
        onSelect: function(unix){
            //console.log($(this)[0].model.input.model);
            let elementId = $(this)[0].model.inputElement.id;
            let datepickerId = elementId.replace("persianpicker","");
            let convertDate = timeConverter(unix);
            console.log('datepicker id : ' + datepickerId);
            console.log('datepicker select : ' + convertDate);
            $(".cpdp" + datepickerId)[0].__vue__.$parent.real_model = convertDate;
        }

    });

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


    $("h2").click(function() {
        //$(".cpaid_at")[0].__vue__.$parent.real_model = "2021-12-28";
    });




    $(".flatpickr-input").each(function() {
        let datepicker_classes = $(this).parent().parent().attr('class').split(" ");
        let datepicker_class = "";
        for(let i = 0 ; i < datepicker_classes.length ; i++){
            if(datepicker_classes[i].startsWith('cpdp')){
                datepicker_class = datepicker_classes[i].replace("cpdp","");
            }
        }

        console.log($(this).attr('class') + ":");
        console.log(datepicker_class + ":");
        console.log($(this).val());

        let timeInMillis = Date.parse($(this).val());
        console.log(timeInMillis);
        if ($("#" + datepicker_class + "persianpicker").length > 0) {
            var pd = $("#" + datepicker_class + "persianpicker").persianDatepicker({
                format: 'YYYY/MM/DD',
                onSelect: function(unix){
                    //console.log($(this)[0].model.input.model);
                    let elementId = $(this)[0].model.inputElement.id;
                    let datepickerId = elementId.replace("persianpicker","");
                    let convertDate = timeConverter(unix);
                    console.log('datepicker id : ' + datepickerId);
                    console.log('datepicker select : ' + convertDate);
                    $(".cpdp" + datepickerId)[0].__vue__.$parent.real_model = convertDate;
                }
            });
            pd.setDate(timeInMillis);
        }


    });

});
