
$(document).ready(function () {


    $("#example6").datetimepicker({
        locale: "de",
        format: "L",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });

    initValidators();


    $('#checkerBtn').click(function () {
        if ($("#theform").valid()) {  // test the form for validity
            alert('form is valid');
        }
        else {
            alert('form is NOT valid');
        }
    });


    //$.validator.setDefaults({
    //    highlight: function (element) {
    //        $(element).closest('.form-group').addClass('has error');
    //    },
    //    unhighlight: function (element) {
    //        $(element).closest('.form-group').removeClass('has-error');
    //    },
    //    errorElement: 'span',
    //    errorClass: 'help-block',
    //    errorPlacement: function (error, element) {
    //        if (element.parent('.input-group').length) {
    //            error.insertAfter(element.parent());
    //        } else {
    //            error.insertAfter(element);
    //        }
    //    }
    //});
    
     
});


function initValidators() {
    alert('initializing...');

    $("#theform").validate({
        rules: {
            example4: {
                email: true,
                required: true
            },
            example5: {
                required: true
            },
            example6: {
                required: true,
                date: true,
                locale: "de",
                format: "L"
            }
        },
        messages: {
            example5: "Just check the box<h5 class='text-danger'>You aren't going to read the EULA</h5>"
        },
        tooltip_options: {
            example4: {
                trigger: 'focus'
            },
            example5: {
                placement: 'right',
                html: true
            }
        },
        submitHandler: function (form) {
            $("#validity_label").html('<div class="alert alert-success">No errors.  Like a boss.</div>');

        },
        invalidHandler: function (form, validator) {
            $("#validity_label").html('<div class="alert alert-danger">There be ' + validator.numberOfInvalids() + ' error' + (validator.numberOfInvalids() > 1 ? 's' : '') + ' here.  OH NOES!!!!!</div>');
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
    });
     

        
   
}
    