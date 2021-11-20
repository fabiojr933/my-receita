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
    if (getValueById('slCategoria') <= 0) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Categoria invalida</div> <br><br>');
        valid = false;
    }
    if (getValueById('txtLinhaFina').length < 10) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Linha fina invalido min 10 caracteres</div> <br><br>');
        valid = false;
    }
    if (getValueById('txtThumb').length < 1) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Linha fina invalido min 1 caracteres</div> <br><br>');
        valid = false;
    }
    if (CKEDITOR.instances['txtDescricao'].getData().length < 10) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Conteudo invalido min 10 caracteres</div> <br><br>');
        valid = false;
    }
    if (validateId && getValueById('txtId') <= 0) {
        appendHTMLById('dvAlert', '<div class="btn btn-warning">Id não encontrado</div> <br><br>');
        valid = false;
    }
    return valid;
}