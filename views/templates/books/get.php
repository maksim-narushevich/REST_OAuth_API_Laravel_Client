{% extends "app.php" %}
{% block title %}Index{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    #links a { margin-bottom: 15px;
        display: inline-block;}
    #from_input{
        color: #2b542c;
        font-weight: bold;
    }
    .warn{
        color: red;
        font-size: 12px;
        font-weight: lighter;
    }
</style>
{% endblock %}
{% block content %}

<div class="col-sm-12 col-xs-12">
    <h1>REST API BOOKS playground page</h1>
    <div class="col-sm-6  col-xs-12" id="links">

        <div id="register_form">
            <h3>Base API URL is:</h3> {{strBaseAPI_URL}}<span id="from_input"></span><hr>
            <div class="form-group">
                <label for="id">ID: <span class="warn">(Only numbers are allowed)</span></label>
                <input type="text" class="form-control" id="id" onkeypress="return isNumberKey(event);">
                <span id="id_error" style="color: red;display: none;"></span>
            </div>
            <div class="form-group">
                <label for="token">Token:</label>
                <textarea id="token" class="form-control"></textarea>
                <span id="token_error" style="color: red;display: none;"></span>
            </div>
            <button class="btn btn-success" id="execute">Execute</button>
        </div>
        <div class="form-group" id="request_value">

        </div>
        <div id="token_try_again" style="display: none;">
            <a  class="btn btn-warning" href="{{strSubfolderRoute}}/get-token">Try again with other credentials</a>
        </div>
    </div>
</div>



<script>
    $("#id").keyup(function(){
        if($(this).val()){
            $("#from_input").text($(this).val());
        }else{
            $("#from_input").text("");
        }
    });
    $("#execute").click(function () {
        var intId=$('#id').val();
        var strToken=$('#token').val();
        $('#request_value').html("");
        $('#id_error,#token_error').hide();

        var blnConfirm = confirm("Are you sure that inserted data is correct?");
        if (blnConfirm == true) {
            var ajaxStatus=true;

            if( !intId) {
                ajaxStatus=false;
                $('#id_error').css('display', 'inline');
                $('#id_error').html("* ID field can not be empty!");
            }

            if( !strToken) {
                ajaxStatus=false;
                $('#token_error').css('display', 'inline');
                $('#token_error').html("* Token field can not be empty!");
            }


            if(ajaxStatus) {
                $.ajax({
                    method: 'POST',
                    url: '{{strSubfolderRoute}}/get_specific_item_user_ajax',
                    data: {
                        ajaxUrlType: 'books',
                        intId: intId,
                        strToken: strToken
                    },
                    success: function (data) {
                        console.log(data);


                        // $('#register_form,#email_error,#pwd_error').hide();
                        // $('#token_try_again').css('display', 'inline-block');
                        // if (!data['error']) {
                        //     strName=strName.charAt(0).toUpperCase() + strName.slice(1);
                        //     var strCredentialsBlock="<p><h1>Your credentials to access REST API</h1><br><b>Login:</b> "+strEmail+"<br><b>Password:</b> "+strPassword+"<br></p><br>";
                        //     $('#token_value').html("<h1 style='color:green;'>"+strName+" thank you for registration!</h1><br>"+strCredentialsBlock+"<h2 style='text-weight:bold;'>This is your access token:</h2><p >" + data['token'] + "</p>");
                        // } else {
                        //     $('#token_value').html("<p style='color:red;' class='w3-center'><img style='margin-top: 25px;'  height='200' src='http://www.heaven4netent.com/wp-content/uploads/2015/10/Sorry.jpg'><br>Provided login or password is not correct!</p>");
                        // }

                    }
                });
            }
        }
    });
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode < 48 || charCode > 57)
            return false;

        return true;
    }
</script>

{% endblock %}