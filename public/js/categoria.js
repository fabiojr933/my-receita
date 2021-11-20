function validar(validateId) {
    getById('dvAlert').innerHTML = '';

    var valid = true;
    if (getValueById('txtTitulo').length < 2) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Titulo invalido min 2 caracteres</div> <br><br>');
        valid = false;
    }
    if (getValueById('txtSlug').length < 3) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Slug invalido min 3 caracteres</div> <br><br>');
        valid = false;
    }
    if (validateId && getValueById('txtId') <= 0) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Id não encontrado</div> <br><br>');
        valid = false;
    }
    return valid;
}