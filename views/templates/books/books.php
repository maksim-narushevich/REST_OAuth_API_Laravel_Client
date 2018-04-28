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
    <h1>REST API BOOKS playground page</h1>
    <div class="col-sm-6  col-xs-12" id="links">

        <ul>
            <li>
                <a href="{{strSubfolderRoute}}/get-token" >Get all books</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/get-token" >Get book by specific ID</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/get-token" >Create new book </a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/get-token" >Update book by specific ID</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/get-token" >Delete book by specific ID</a>
            </li>
        </ul>
    </div>
</div>
{% endblock %}