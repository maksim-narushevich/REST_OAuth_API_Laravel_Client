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
    <h1>REST API PRODUCTS playground page</h1>
    <div class="col-sm-6  col-xs-12" id="links">
        <ul>
            <li>
                <a href="{{strSubfolderRoute}}/playground/products/all" >Get all products</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/products/id" >Get product by specific ID</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/products/create" >Create new product </a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/products/update" >Update product by specific ID</a>
            </li>
            <li>
                <a href="{{strSubfolderRoute}}/playground/products/delete" >Delete product by specific ID</a>
            </li>
        </ul>
    </div>
</div>
{% endblock %}