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
    <h1>REST API MOVIES playground page</h1>
    <div class="col-sm-6  col-xs-12" id="links">
        <ul>
            <li>
                <a href="{{strSubfolderRoute}}/playground/movies/all" >Get all movies</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/movies/id" >Get movie by specific ID</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/movies/create" >Create new movie </a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/movies/update" >Update movie by specific ID</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/movies/delete" >Delete movie by specific ID</a>
            </li>
        </ul>
    </div>
</div>
{% endblock %}