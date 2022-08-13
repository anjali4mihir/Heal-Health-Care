$("#country").change(function() {
    var id = $(this).val();
    $.ajax({
            method: "POST",
            url: ajaxurl + 'get_state',
            data: { id: id }
        })
        .done(function(msg) {
            //  alert(msg);
            if (msg != '') {
                $("#state").html(msg);
                //$('#state').niceSelect('update');
            }
        });
});
$("#state").change(function() {
    var id = $(this).val();
    $.ajax({
            method: "POST",
            url: ajaxurl + 'get-city',
            data: { id: id }
        })
        .done(function(msg) {
            //  alert(msg);
            if (msg != '') {
                $("#city").html(msg);
                //$('#city').niceSelect('update');
            }
        });
});
$(window).on("load", function() {
    var country = $("#country").val();

    $.ajax({
            method: "POST",
            url: ajaxurl + 'get-state',
            data: { id: country }
        })
        .done(function(msg) {
            //  alert(msg);
            if (msg != '') {
                $("#state").html(msg);
                $("#state").val(selectedstate);
                //$('#state').niceSelect('update');
            }
        });
    $.ajax({
            method: "POST",
            url: ajaxurl + 'get-city',
            data: { id: selectedstate }
        })
        .done(function(msg) {
            //  alert(msg);
            if (msg != '') {
                $("#city").html(msg);
                $("#city").val(selectedcity);
                //$('#city').niceSelect('update');
            }
        });
});