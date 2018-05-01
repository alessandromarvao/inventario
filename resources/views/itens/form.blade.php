{!! csrf_field() !!}
<hr class="botton-line">
<div class="form-group">
    <label for="id">Número do Inventário:</label>
    <input type="text" name="id" id="id" class="form-control" value="{{ $item->id ?? '' }}" placeholder="Digite aqui o número da sala">
</div>
<div class="form-group">
    <label for="predio">Predio:</label>
    <select name="predio" id="predio" class="form-control"></select>
</div>
<div class="form-group">
    <label for="sala">Sala:</label>
    <select name="sala" id="sala" class="form-control"></select>
</div>
<div class="form-group">
    <label for="predio">Tombamento:</label>
    <input type="text" name="id" id="id" class="form-control" value="{{ $item->tombamento ?? '' }}" placeholder="Digite o prédio">
</div>
<br>
<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
    <a href="/item" class="btn btn-default">Cancelar</a>
</div>
