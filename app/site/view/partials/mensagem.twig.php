{% extends "partials/body.twig.php" %}
{% block title %} {{titulo}} - Receita {% endblock %}
{% block body %}
<h1>{{titulo}}</h1>

<div>
    {{mensagem}}
    <hr>
    <a href="{{BASE}}{{uri}}" class="btn btn-primary">Voltar</a>
</div>

{% endblock %}