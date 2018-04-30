{!! csrf_field() !!}
<hr class="botton-line">
<div class="form-group">
    <label for="id">Número da Sala:</label>
    <input type="text" name="id" id="id" class="form-control" value="{{ $sala->id ?? '' }}" placeholder="Digite aqui o número da sala">
</div>
<div class="form-group">
    <label for="predio">Prédio:</label>
    <select name="predio" id="predio" class="form-control"></select>
</div>
<div class="form-group">
    <label for="sala">Sala:</label>
    <select name="sala" id="sala"></select>
</div>
<br>
<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
    <a href="/sala" class="btn btn-default">Cancelar</a>
</div>