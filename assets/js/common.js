function shortList(profile,userId){
    $.ajax({
        type: "POST",
        url: "includes/ajex_call.php",
        data: {profile:profile,userId:userId},
        cache: false,
        success:  function(data){
            if (data) {
                myFunction();
            }
        }
    });
}
// show images in model here
$(document).ready(function() {
    $(document).on('click', '#profileId', function(e){
        e.preventDefault();
        var profileIdData = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content-photo').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'profileIdData='+profileIdData,
            dataType: 'html'
        })
        .done(function(data){
            $('#dynamic-content-photo').html('');
            $('#dynamic-content-photo').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content-photo').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});

// show personal details here
$(document).ready(function() {
    $(document).on('click', '#profileIdPersonal', function(e){
        e.preventDefault();
        var PersonalProfile = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'PersonalProfile='+PersonalProfile,
            dataType: 'html'
        })

        .done(function(data){
            $('#dynamic-content').html('');
            $('#dynamic-content').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});

// show Educational details here
$(document).ready(function() {
    $(document).on('click', '#profileIdEducation', function(e){
        e.preventDefault();
        var EducationProfile = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content-edu').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'EducationProfile='+EducationProfile,
            dataType: 'html'
        })

        .done(function(data){
            $('#dynamic-content-edu').html('');
            $('#dynamic-content-edu').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content-edu').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});

// show family details here
$(document).ready(function() {
    $(document).on('click', '#familyIdEducation', function(e){
        e.preventDefault();
        var FamilyProfile = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'FamilyProfile='+FamilyProfile,
            dataType: 'html'
        })

        .done(function(data){
            console.log(data);
            $('#dynamic-content-fm').html('');
            $('#dynamic-content-fm').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content-fm').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});

// show address details here
$(document).ready(function() {
    $(document).on('click', '#profileIdAddress', function(e){
        e.preventDefault();
        var profileAddress = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content-add').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'profileAddress='+profileAddress,
            dataType: 'html'
        })

        .done(function(data){
            console.log(data);
            $('#dynamic-content-add').html('');
            $('#dynamic-content-add').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content-add').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});

// show about details here
$(document).ready(function() {
    $(document).on('click', '#profileIdAbout', function(e){
        e.preventDefault();
        var PersonalAbout = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content-about').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'PersonalAbout='+PersonalAbout,
            dataType: 'html'
        })

        .done(function(data){
            console.log(data);
            $('#dynamic-content-about').html('');
            $('#dynamic-content-about').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content-about').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});

// show partner Preference  here
$(document).ready(function() {
    $(document).on('click', '#profileIdPartner', function(e){
        e.preventDefault();
        var PartnerProfile = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content-part').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'PartnerProfile='+PartnerProfile,
            dataType: 'html'
        })

        .done(function(data){
            console.log(data);
            $('#dynamic-content-part').html('');
            $('#dynamic-content-part').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content-part').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});

// show contact Preference  here
$(document).ready(function() {
    $(document).on('click', '#profileIdContact', function(e){
        e.preventDefault();
        var ContactProfile = $(this).data('id');   // it will get id of clicked row
        $('#dynamic-content-contact').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        $.ajax({
            url: 'includes/ajex_call.php',
            type: 'POST',
            data: 'ContactProfile='+ContactProfile,
            dataType: 'html'
        })

        .done(function(data){
            console.log(data);
            $('#dynamic-content-contact').html('');
            $('#dynamic-content-contact').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content-contact').html('<i class="glyphicon glyphicon-info-sign"></i>' +
                ' Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });
});


// snackbar show here
function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function()
    {
        x.className = x.className.replace("show", "");
    }, 2000);
}

//update personal details
 $(function(){
    $('#PersonalModal').on('submit', function(e){
        $("#PersonalModal").modal('show');
        e.preventDefault();
        $.ajax({
            url: 'includes/update_ajex_call.php', //this is the submit URL
            type: 'POST', //or POST
            data: $('#personal-details-form').serialize(),
            success: function(data){
                $("#PersonalModal").modal('hide');
                myFunction();
                setTimeout(function() {
                    window.location.href = "my_profile.php"
                }, 3000);
            }
        });
    });
});

//update Education details
$(function(){
    $('#EducationModal').on('submit', function(e){
        $("#EducationModal").modal('show');
        e.preventDefault();
        $.ajax({
            url: 'includes/update_ajex_call.php', //this is the submit URL
            type: 'POST', //or POST
            data: $('#education-details-form').serialize(),
            success: function(data){
                $("#EducationModal").modal('hide');
                myFunction();
                setTimeout(function() {
                    window.location.href = "my_profile.php"
                }, 3000);
            }
        });
    });
});

//update Family details
$(function(){
        $('#FamilyModal').on('submit', function(e){
        $("#FamilyModal").modal('show');
        e.preventDefault();
        $.ajax({
            url: 'includes/update_ajex_call.php', //this is the submit URL
            type: 'POST', //or POST
            data: $('#family-details-form').serialize(),
            success: function(data){
                $("#FamilyModal").modal('hide');
                myFunction();
                setTimeout(function() {
                    window.location.href = "my_profile.php"
                }, 3000);
            }
        });
    });
});

//update About details
$(function(){
    $('#AboutModal').on('submit', function(e){
        $("#AboutModal").modal('show');
        e.preventDefault();
        $.ajax({
            url: 'includes/update_ajex_call.php', //this is the submit URL
            type: 'POST', //or POST
            data: $('#about-details-form').serialize(),
            success: function(data){
                $("#AboutModal").modal('hide');
                myFunction();
                setTimeout(function() {
                    window.location.href = "my_profile.php"
                }, 3000);
            }
        });
    });
});

//update Family details
$(function(){
    $('#ContactModal').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'includes/update_ajex_call.php', //this is the submit URL
            type: 'POST', //or POST
            data: $('#contact-details-form').serialize(),
            success: function(data){
                console.log(data);
                $("#ContactModal").modal('hide');
                myFunction();
                setTimeout(function() {
                    window.location.href = "my_profile.php"
                }, 3000);
            }
        });
    });
});

//update address details
$(function(){
    $('#AddressModal').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'includes/update_ajex_call.php', //this is the submit URL
            type: 'POST', //or POST
            data: $('#address-details-form').serialize(),
            success: function(data){
                console.log(data);
                $("#AddressModal").modal('hide');
                myFunction();
                setTimeout(function() {
                    window.location.href = "my_profile.php"
                }, 3000);
            }
        });
    });
});

//update partner details
$(function(){
    $('#PartnerModal').on('submit', function(e){
        $("#PartnerModal").modal('show');
        e.preventDefault();
        $.ajax({
            url: 'includes/update_ajex_call.php', //this is the submit URL
            type: 'POST', //or POST
            data: $('#partner-details-form').serialize(),
            success: function(data){
                $("#PartnerModal").modal('hide');
                myFunction();
                setTimeout(function() {
                     window.location.href = "my_profile.php"
                }, 3000);
            }
        });
    });
});

