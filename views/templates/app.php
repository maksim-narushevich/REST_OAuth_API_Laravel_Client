<!DOCTYPE html>
<html>
<head>
    {% block head %}
    <link rel="stylesheet" href="/public/css/style.css" />
    <title>{% block title %}{% endblock %} - My Webpage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {% endblock %}
</head>
<body>
<div id="content">{% block content %}{% endblock %}</div>
<div id="footer">
    {% block footer %}
    &copy; Copyright 2011 by <a href="http://domain.invalid/">you</a>.
    {% endblock %}
</div>
<script src="/public/js/script.js"></script>
</body>
</html>