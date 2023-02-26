<div>
    <label> Email</label>
    <input type="email" autocomplete="off" class='nao-tem-ainda' name="email" value={{ $user->email ?? '' }}>
</div>
<div>
    <label> Nome </label>
    <input type="text" class="nao tem ainda" name="name" value={{ $user->name ?? ''}}>
</div>
<div>
    <label> Senha </label>
    <input type="password" autocomplete="off" class="nao tem ainda" name="password" value={{ $user->password ?? ''}}>
</div>
<button type="submit" class="btn-submit"> Criar </button>