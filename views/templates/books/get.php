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
    pre {outline: 1px solid #ccc; padding: 5px; margin: 5px; }
    .string { color: green; }
    .number { color: darkorange; }
    .boolean { color: blue; }
    .null { color: magenta; }
    .key { color: red; }
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
        <div id="block_try_again" style="display: none;">
            <a  class="btn btn-warning" id="try_again">Try again</a>
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
    $("#try_again").click(function () {
        $('#register_form').show();
        $('#request_value').html("");
        $('#block_try_again').css('display', 'none');
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
                        $('#register_form,#token_error,#id_error').hide();
                        $('#block_try_again').css('display', 'inline-block');
                        if (!data['error']) {

                            function output(inp) {
                                var request_value=document.getElementById("request_value");
                                request_value.appendChild(document.createElement('pre')).innerHTML = inp;
                            }

                            function syntaxHighlight(json) {
                                json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                                return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
                                    var cls = 'number';
                                    if (/^"/.test(match)) {
                                        if (/:$/.test(match)) {
                                            cls = 'key';
                                        } else {
                                            cls = 'string';
                                        }
                                    } else if (/true|false/.test(match)) {
                                        cls = 'boolean';
                                    } else if (/null/.test(match)) {
                                        cls = 'null';
                                    }
                                    return '<span class="' + cls + '">' + match + '</span>';
                                });
                            }

                            //var obj = {a:1, 'b':'foo', c:[false,'false',null, 'null', {d:{e:1.3e5,f:'1.3e5'}}]};
                            var str = JSON.stringify(data['result'], undefined, 4);

                            //output(str);
                            output(syntaxHighlight(str));
                        } else {
                            $('#request_value').html("<p style='color:red;' class='w3-center'><img style='margin-top: 25px;'  height='200' src='http://www.heaven4netent.com/wp-content/uploads/2015/10/Sorry.jpg'><br>Provided token or ID is not correct!</p>");
                        }

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