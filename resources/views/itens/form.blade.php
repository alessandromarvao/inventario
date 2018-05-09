{!! csrf_field() !!}
<hr class="botton-line">
<div class="hidden">
    <input type="text" name="id" id="id" class="form-control" value="{{ $item->id ?? '' }}" placeholder="Digite aqui o número da sala">
    <input type="text" name="idPredio" id="idPredio" class="form-control" value="{{ $item->sala->predio->id ?? '' }}" placeholder="Digite aqui o número da sala">
    <input type="text" name="idSala" id="idSala" class="form-control" value="{{ $item->sala->id ?? '' }}" placeholder="Digite aqui o número da sala">
</div>
<div class="form-group">
    <label for="inventario">Inventário:</label>
    <input type="text" name="inventario" id="inventario" class="form-control" value="{{ $item->inventario ?? '' }}" placeholder="Digite o código do inventário">
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea rows="5" name="descricao" id="descricao" class="form-control">{{ $item->descricao ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="descricao_sugerida">Sugestão para descrição</label>
    <textarea rows="5" name="descricao_sugerida" id="descricao_sugerida" class="form-control">{{ $item->descricao_sugerida ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="responsavel">Responsável:</label>
    <input type="text" name="responsavel" id="responsavel" class="form-control" value="{{ $item->responsavel ?? '' }}" placeholder="Digite aqui o número da sala">
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
    <label for="estado">Estado de Conservação:</label>
    <select name="estado" id="estado" class="form-control">
        <option value="Bom">Bom</option>
        <option value="Ocioso">Ocioso</option>
        <option value="Inservível">Inservível ou com defeito</option>
    </select>
</div>
<div class="form-group">
    <label for="observacao">Observacao:</label>
    <textarea name="observacao" id="observacao" class="form-control">{{ $item->observacao ?? ''}}</textarea>
</div>
<br>
<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
    <a href="/item" class="btn btn-default">Cancelar</a>
</div>
