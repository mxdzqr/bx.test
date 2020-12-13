$().ready(function() {
    $("#followEventForm").submit(function(e){
        e.preventDefault();

        let form = $(this);
        let whyValue = form.find(':input[name="event"]').val();

        if ($.isNumeric(whyValue)) {
            $.ajax({
                type: "POST",
                url: '/local/script/followEvent.php',
                data: form.serialize(),
                success: function (data) {
                    $("#followEvent").remove();
                    document.location.reload();
                }
            });
        } else {
            alert("Error");
        }
    });
});

$().ready(function() {
    $("#checkReadLater").on('click', function(){


            $('#fio').hide();
            $('#readLaterList').show();
    });
});


