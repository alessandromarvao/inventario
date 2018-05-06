{!! csrf_field() !!}
<hr class="botton-line">
<div class="form-group">
    @if(!empty($predio->id))
        <input type="hidden" name="id" id="id" class="form-control" value="{{ $predio->id}} " disabled>
    @endif
</div>
<div class="form-group">
    <label for="predio">Prédio:</label>
    <input type="text" name="predio" id="predio" class="form-control" value="{{ $predio->predio ?? '' }}" placeholder="Digite aqui a identificação do prédio" required autocomplete="off">
</div>
<br>
<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
    <a href="/predio" class="btn btn-default">Cancelar</a>
</div>
