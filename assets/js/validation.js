$(function() {
    $("form[name='personal-details-form']").validate({
        // Specify validation rules
        rules: {
            name: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            gotra: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        // Specify validation error messages
        messages: {
            name: "Please enter your firstname",
            gotra: "Please Select Gotra",
            lastname: "Please enter your lastname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});