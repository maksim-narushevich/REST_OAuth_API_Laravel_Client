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
    <div id="token_form">
    <h1>Get token</h1>
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
        <button class="btn btn-success" id="getToken">Get token</button>
    </div>
    <div class="form-group" id="token_value">

    </div>
    <div id="token_button_try_again" style="display: none;">
        <button  class="btn btn-warning" id="tryAgain">Try again</button>
    </div>
</div>
</div>



<script>
    $("#getToken").click(function () {
        var strEmail=$('#email').val();
        var strPass=$('#pwd').val();
        $('#token_value').html("");
        $('#email_error,#pwd_error').hide();

        var blnConfirm = confirm("Are you sure that inserted data is correct?");
        if (blnConfirm == true) {
            var ajaxStatus=true;

            if( !strEmail) {
                ajaxStatus=false;
                $('#email_error').css('display', 'inline');
                $('#email_error').html("* Email field can not be empty!");
            }

            if( !strPass) {
                ajaxStatus=false;
                $('#pwd_error').css('display', 'inline');
                $('#pwd_error').html("* Password field can not be empty!");
            }
            if(ajaxStatus) {
                $.ajax({
                    method: 'POST',
                    url: '{{strSubfolderRoute}}/get_token_ajax',
                    data: {
                        strEmail: strEmail,
                        strPassword: strPass
                    },
                    success: function (data) {
                        $('#token_form,#email_error,#pwd_error').hide();
                        $('#token_button_try_again').css('display', 'inline-block');
                        if (!data['error']) {
                            $('#token_value').html("<h1 style='text-weight:bold;'>This is your access token:</h1><p >" + data['result'] + "</p>");
                        } else {
                            $('#token_value').html("<p style='color:red;' class='w3-center'><img style='margin-top: 25px;'  height='200' src='http://www.heaven4netent.com/wp-content/uploads/2015/10/Sorry.jpg'><br>Provided login or password is not correct!</p>");
                        }

                    }
                });
            }
        }
    });
    $("#tryAgain").click(function () {
       $('#email,#pwd').val("");
        $('#token_form').show();
        $('#token_value').html("");
        $('#email_error,#pwd_error').hide();
        $('#token_button_try_again').css('display','none');
    });
</script>
{% endblock %}

