jQuery(document).ready(function ($) {
    $("#jform_date_start, #jform_date_end").mask("99/99/9999");
    $("#jform_hour_start, #jform_hour_end").mask("99:99");
    $("#jform_contact").inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999", ],
        keepStatic: true
    });

    $('#jform_date_start').focusout(function () {
        if ($("#jform_date_start").val().length > 0) {
            if (validarData($("#jform_date_start").val()) === false) {
                noty({
                    text: 'Data Inválida!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 4000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#jform_date_start").focus();
                            $("#jform_date_start").val('');
                        },
                    }
                });
                return false;
            }
        }
    });

    $('#jform_hour_start').focusout(function () {
        if ($("#jform_hour_start").val().length > 0) {
            if (validateTime($("#jform_hour_start").val()) === false) {
                noty({
                    text: 'Horário Inválido!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 4000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#jform_hour_start").focus();
                            $("#jform_hour_start").val('');
                        },
                    }
                });
                return false;
            }
        }
    });

    $('#jform_date_end').focusout(function () {
        if ($("#jform_date_end").val().length > 0) {
            if (validarData($("#jform_date_end").val()) === false) {
                noty({
                    text: 'Data Inválida!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 4000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#jform_date_end").focus();
                            $("#jform_date_end").val('');
                        },
                    }
                });
                return false;
            }
        }
    });

    $('#jform_hour_end').focusout(function () {
        if ($("#jform_hour_end").val().length > 0) {
            if (validateTime($("#jform_hour_end").val()) === false) {
                noty({
                    text: 'Horário Inválido!',
                    layout: 'top',
                    type: 'warning',
                    modal: true,
                    timeout: 4000,
                    onClick: function ($noty) {
                        $noty.close();
                    },
                    callback: {
                        onClose: function () {
                            $("#jform_hour_end").focus();
                            $("#jform_hour_end").val('');
                        },
                    }
                });
                return false;
            }
        }
    });

    $('.no-list').on('click',function () {
        noty({
            text: 'Não existe inscritos nesse evento!',
            layout: 'top',
            type: 'warning',
            modal: true,
            timeout: 4000,
            onClick: function ($noty) {
                $noty.close();
            }
        });
        return false;
    });
});

function validarData(dateString) {

    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12){
        return false;
    }

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};

function validateTime(inputStr) {
    if (!inputStr || inputStr.length<1) {
        return false;
    }
    var time = inputStr.split(':');
    return time.length === 2
        && parseInt(time[0],10)>=0
        && parseInt(time[0],10)<=23
        && parseInt(time[1],10)>=0
        && parseInt(time[1],10)<=59;
}