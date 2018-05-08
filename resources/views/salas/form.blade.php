{!! csrf_field() !!}
<hr class="botton-line">
<div class="form-group">
    <input type="hidden" name="id" id="id" class="form-control" value="{{ $sala->id ?? '' }}" placeholder="Digite aqui o número da sala">
</div>
<div class="form-group">
    <label for="predio">Selecione o Prédio:</label>
    <select name="predio" id="predio" class="form-control"></select>
</div>
<div class="form-group">
    <label for="sala">Sala:</label>
	<input type="text" name="sala" id="sala" class="form-control" value="{{ $sala->sala ?? '' }}" placeholder="Digite aqui a identificação da sala" required autocomplete="off">
</div>
<div class="form-group">
    <label for="visitada">Esta sala já foi visitada?</label>
    <select name="visitada" id="visitada" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
</div>
<div class="form-group hidden" id="exibe_data">
    <label for="data">Data da visita:</label>
    <input type="date" name="data" id="data" class="form-control" >
</div>
<br>
<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
    <a href="/sala" class="btn btn-default">Cancelar</a>
</div>
