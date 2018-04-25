<!DOCTYPE html>
<html>
<head>
    {% block head %}
    <link rel="stylesheet" href="/public/css/style.css"/>
    <title>{% block title %}{% endblock %} - OAuth REST Client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {% endblock %}
</head>
<body>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">


        <div id="content">{% block content %}{% endblock %}</div>
        <div class="col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
            <div id="footer">
                {% block footer %}
                Developed by <a href="https://www.linkedin.com/in/maksim-narushevich-b99783106/" target="_blank">Maksim Narushevich</a>.
                {% endblock %}
            </div>
        </div>
    </div>
</div>

<script src="/public/js/script.js"></script>
</body>
</html>