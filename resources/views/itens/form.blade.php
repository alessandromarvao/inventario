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
    <label for="tombamento">Tombamento:</label>
    <input type="text" name="tombamento" id="tombamento" class="form-control" value="{{ $item->tombamento ?? '' }}" placeholder="Digite o código do tombamento">
</div>
<div class="form-group">
    <label for="situacao">Situação:</label>
    <select name="situacao" id="situacao" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
</div>
<div class="form-group">
    <label for="estado">Estado de Conservação:</label>
    <select name="estado" id="estado" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
</div>
<div class="form-group">
    <label for="status">Status do Inventário:</label>
    <select name="status" id="status" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
</div>
<br>
<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
    <a href="/item" class="btn btn-default">Cancelar</a>
</div>
