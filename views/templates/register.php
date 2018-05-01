{% extends "app.php" %}
{% block title %}Index{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    #token_value {
        word-wrap: break-word;
    }
</style>
{% endblock %}
{% block content %}


<div class="col-sm-12 col-xs-12">
    <div class="col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
        <div id="register_form">
            <h1>Register new user</h1>
            <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control" id="name">
                <span id="name_error" style="color: red;display: none;"></span>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
                <span id="email_error" style="color: red;display: none;"></span>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
                <span id="pwd_error" style="color: red;display: none;"></span>
            </div>
            <button class="btn btn-success" id="registerUser">Register</button>
        </div>
        <div class="form-group" id="token_value">

        </div>
        <div id="token_try_again" style="display: none;">
            <a  class="btn btn-warning" href="{{strSubfolderRoute}}/get-token">Try again with other credentials</a>
        </div>
    </div>
</div>



<script>
    $("#registerUser").click(function () {
        var strEmail=$('#email').val();
        var strPassword=$('#pwd').val();
        var strName=$('#name').val();
        $('#token_value').html("");
        $('#email_error,#pwd_error,#name_error').hide();

        var blnConfirm = confirm("Are you sure that inserted data is correct?");
        if (blnConfirm == true) {
            var ajaxStatus=true;

            if( !strName) {
                ajaxStatus=false;
                $('#name_error').css('display', 'inline');
                $('#name_error').html("* Name field can not be empty!");
            }

            if( !strEmail) {
                ajaxStatus=false;
                $('#email_error').css('display', 'inline');
                $('#email_error').html("* Email field can not be empty!");
            }

            if( !strPassword) {
                ajaxStatus=false;
                $('#pwd_error').css('display', 'inline');
                $('#pwd_error').html("* Password field can not be empty!");
            }

            if(ajaxStatus) {
                $.ajax({
                    method: 'POST',
                    url: '{{strSubfolderRoute}}/register_user_ajax',
                    data: {
                        strName: strName,
                        strEmail: strEmail,
                        strPassword: strPassword
                    },
                    beforeSend: function () {
                        //-- Show loader image
                        $("div#divLoading").addClass('show');
                    },
                    success: function (data) {
                        $('#register_form,#email_error,#pwd_error').hide();
                        $('#token_try_again').css('display', 'inline-block');

                        //-- Remove loader image
                        $("div#divLoading").removeClass('show');

                        if (!data['error']) {
                            strName=strName.charAt(0).toUpperCase() + strName.slice(1);
                            var strCredentialsBlock="<p><h1>Your credentials to access REST API</h1><br><b>Login:</b> "+strEmail+"<br><b>Password:</b> "+strPassword+"<br></p><br>";
                            $('#token_value').html("<h1 style='color:green;'>"+strName+" thank you for registration!</h1><br>"+strCredentialsBlock+"<h2 style='text-weight:bold;'>This is your access token:</h2><p >" + data['token'] + "</p>");
                        } else {
                            $('#token_value').html("<p style='color:red;' class='w3-center'><img style='margin-top: 25px;'  height='200' src='http://www.heaven4netent.com/wp-content/uploads/2015/10/Sorry.jpg'><br>Provided login or password is not correct!</p>");
                        }

                    }
                });
          }
        }
    });

</script>
{% endblock %}

