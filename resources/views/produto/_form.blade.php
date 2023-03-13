<div>
    <label> Nome</label>
    <input type="text" autocomplete="off" class='nao-tem-ainda' name="nome" value={{ $produto->nome ?? '' }}>
</div>
<div>
    <label> Preço </label>
    <input type="text" class="nao tem ainda" name="preco" value={{ $produto->preco ?? ''}}>
</div>
<button type="submit" class="btn-submit"> Salvar </button>
