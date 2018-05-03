<!DOCTYPE html>
<html>
<head>
    {% block head %}
    <link rel="stylesheet" href="{{strSubfolderRoute}}/public/css/style.css"/>
    <title>{% block title %}{% endblock %} - OAuth REST Client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .inline{
            display:inline;
        }
    </style>
    {% endblock %}
</head>
<body>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
            {% if home is not defined %}
            <h1 class="inline"><a  class="btn btn-warning" href="{{strSubfolderRoute}}/">Home page</a></h1>
            {% endif %}
            {% if playground is  defined %}
            <h1 class="inline"><a  class="btn btn-info" href="{{strSubfolderRoute}}/playground">Back to Playground</a></h1>
            {% endif %}
            {% if token is  defined %}
            <h1 class="inline"><a  class="btn btn-success" href="{{strSubfolderRoute}}/get-token">Get authorization token</a></h1>
            {% endif %}
        </div>
        <div id="content">{% block content %}{% endblock %}</div>
        <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
            <div id="footer">
                {% block footer %}
                2018 || Developed by <a href="https://www.linkedin.com/in/maksim-narushevich-b99783106/" target="_blank">Maksim Narushevich</a>.
                {% endblock %}
            </div>
        </div>
    </div>
    <div id="divLoading"></div>
</div>

<script src="{{strSubfolderRoute}}/public/js/script.js"></script>
</body>
</html>