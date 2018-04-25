{% extends "app.php" %}
{% block title %}Index{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    .important { color: #336699; }
</style>
{% endblock %}
{% block content %}
<h1>Home</h1>
<p class="important">
    This is home page!
</p>
{% endblock %}