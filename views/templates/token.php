{% extends "app.php" %}
{% block title %}Index{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    .important { color: #336699; }
</style>
{% endblock %}
{% block content %}
<h1>Index</h1>
<p class="important">
    Welcome to Token page.
</p>


<script>
    $( document ).ready(function() {
        $.ajax({
            method: 'POST',
            url: '/test_ajax',
            data: {
                strEmail:'anna@gmail.com',
                strPassword:'annaqwerty'
            },
            success: function (data) {
                console.log(data);
            }
        });
    });
</script>
{% endblock %}

