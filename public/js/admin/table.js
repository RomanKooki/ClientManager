$(function() {

    $('select[name="limit"]').change(function(e) {

        var url = '?limit=' + $(this).val(),
            query = $('input[name="query"]').val();

        if( typeof(query) !== "undefined" && query != '' )
            url += '&query='+ query;

        document.location = url;

    });

    $('#query').keyup(function(e) {

        var code = (e.keyCode ? e.keyCode : e.which);

        // enter
        if(code == 13) {

            do_search();

        }

        // escape
        if(code == 27) $('#query').val('');

    });

    $('#q').keyup(function(e) {

        var code = (e.keyCode ? e.keyCode : e.which);

        // enter
        if(code == 13) {

            advanced_search();

        }

        // escape
        if(code == 27) $('#q').val('');

    });

    $('#btn_reset').click(reset_search);
    $('#btn_clear').click(clear_field);
    $('#btn_search').click(do_search);

    $('#btn_advanced_reset').click(reset_search);
    $('#btn_advanced_clear').click(advanced_clear_field);
   // $('#btn_advanced_search').click(advanced_search);
    $('#btn_advanced').click(advanced_action);

    $('form[name="form_search"]').submit(function(e) {

        e.preventDefault();

        $('form[name="form_search"] select, form[name="form_search"] input[type="text"]').each(function(cnt, item) {

            if($(item).val() == '')
                $(item).attr('name','');

        });

        $(this)[0].submit();

    });

    $(document).on( "change", "select[name=task_type]", function() {

        if($(this).val() > 2)
        {

            $('.task-list-row').show();

        } else {

            $('.task-list-row').hide();

        }

    });

    $('.table-checkbox tr td input[type=checkbox]').click(function() {

        var total = $('.table-checkbox tr td input[type=checkbox]:checked').length;

        if(total) {

            $('#controls_default').hide();
            $('#controls_checked').show();

        } else {

            $('#controls_checked').hide();
            $('#controls_default').show();

        }

        $('.check-total').html(total);

    });

});

function clearCheckboxes()
{

    $('.table-checkbox tr td input[type=checkbox]').prop('checked', false);

    $('#controls_checked').hide();
    $('#controls_default').show();

}

function selectCheckboxes()
{

    $('.table-checkbox tr td input[type=checkbox]').prop('checked', true);

}

function clear_field() {

    $('#query').val('');

}

function do_search() {

    var url = '?limit=' + $('select[name="limit"]').val(),
        query = $('input[name="query"]').val();

    if( typeof(query) !== undefined && query != '' )
        url += '&query='+ query;

    document.location = url;

}

function reset_search(e) {

    e.preventDefault();

    document.location = '?limit=25';

}

function confirm_delete(url) {

    bootbox.dialog({
        message: 'Are you sure you want to delete this item?',
        title: "Confirm",
        buttons: {
            success: {
                label: "Yes",
                className: "btn-success",
                callback: function() {
                    document.location = url;
                }
            },
            danger: {
                label: "No",
                className: "btn-danger"
            }
        }
    });

}

function confirm_msg(msg, url) {

    bootbox.dialog({
        message: msg,
        title: "Notification",
        buttons: {
            success: {
                label: "Yes",
                className: "btn-success",
                callback: function() {
                    document.location = url;
                }
            },
            danger: {
                label: "No",
                className: "btn-danger"
            }
        }
    });

}

function checkbox_msg(msg, url) {

    bootbox.dialog({
        message: msg,
        title: "Notification",
        buttons: {
            success: {
                label: "Yes",
                className: "btn-success",
                callback: function() {

                    var checked = [];

                    $('.table-checkbox tr td input[type=checkbox]:checked').each(function(cnt, item) {

                        checked.push($(item).val());

                    });

                    document.location = url + '?checked='+checked.join(',');

                }
            },
            danger: {
                label: "No",
                className: "btn-danger"
            }
        }
    });

}



function info_window(url, className) {

    var msg = $('<p>Loading, please wait...</p>');

    bootbox.dialog({
       // title: title,
        message: msg,
        className: (typeof(className) != "undefined" && className != null) ? className : ''
    });

    $.get(url, function(html) {

        msg.html(html);

    });

}

function advanced_search(e) {

    e.preventDefault();

    $('form[name="form_search"]').submit();

}

function advanced_action(e) {

    e.preventDefault();

    var btn = $(this);

    if($('.box-advanced').hasClass('closed')) {

        $('.box-advanced').removeClass('closed');
        $('.box-advanced').addClass('open');

        btn.addClass('active');


    } else {

        $('.box-advanced').removeClass('open');
        $('.box-advanced').addClass('closed');

        btn.removeClass('active');

    }

}

function advanced_clear_field() {

    var elements = $('form[name="form_search"] input[type="text"], form[name="form_search"] select');

    elements.val('');
    elements.children('option').removeAttr('selected');

}

function action_form(url, form, button, callback) {

    var msg = $('<p>Loading, please wait...</p>');

    bootbox.dialog({
        message: msg,
       // title: title,
        buttons: {
            success: {
                label: button,
                className: "btn-success",
                callback: function() {
                    $(form).submit();
                }
            },
            danger: {
                label: "Close",
                className: "btn-danger"
            }
        }
    });

    $.get(url, function(html) {

        msg.html(html);

        if(typeof callback == 'function')
            callback();

    })

}