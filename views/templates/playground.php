{% extends "app.php" %}
{% block title %}Index{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    #links a { margin-bottom: 15px;
        display: inline-block;}
</style>
{% endblock %}
{% block content %}

<div class="col-sm-12 col-xs-12">
    <h1>REST API playground page</h1>
    <div class="col-sm-6  col-xs-12" id="links">
        <a href="{{strSubfolderRoute}}/playground/books" class="btn btn-success">BOOKS</a>
        <a href="{{strSubfolderRoute}}/playground/movies" class="btn btn-success">MOVIES</a>
        <a href="{{strSubfolderRoute}}/playground/users" class="btn btn-success">USERS</a>
        <a href="{{strSubfolderRoute}}/playground/products" class="btn btn-success">PRODUCTS</a>
    </div>
</div>
{% endblock %}