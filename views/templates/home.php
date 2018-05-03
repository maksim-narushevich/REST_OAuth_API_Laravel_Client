{% extends "app.php" %}
{% block title %}Index{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    #links a { margin-bottom: 15px;
    display: inline-block;}
    #links i{
        color: darkgreen;
        font-size: 30px;
        margin-right: 20px;
    }
    #links i:hover{
        color: lightgreen;
    }

</style>
{% endblock %}
{% block content %}
<h1>Discoveringworld API</h1>
<div class="col-sm-12 col-xs-12">
    <div class="col-sm-6  col-xs-12" id="links">
        <a href="{{strSubfolderRoute}}/get-token" ><i class="fab fa-typo3"></i> Get authorization token</a><br>

        <a href="{{strSubfolderRoute}}/register" ><i class="fas fa-user"></i> Register new user</a><br>

        <a href="{{strSubfolderRoute}}/playground" ><i class="fab fa-gripfire"></i> Try API playground</a><br>
        <a href="{{strSubfolderRoute}}/test" ><i class="fas fa-file-alt"></i> Check API documentation based on Swagger</a><br>
    </div>
    </div>
{% endblock %}