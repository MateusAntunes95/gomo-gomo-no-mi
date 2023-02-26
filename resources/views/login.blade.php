<form method="post" action=" {{ url('login/auth') }}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div>
        <input type="email" name="email" class="nao-tem-ainda">
    </div>
    <div>
        <input type="password" name="password" class="nao-tem-ainda">
    </div>
    <div>
        <button type="submit" class="btn-submit">Login</button>
    </div>
</form>