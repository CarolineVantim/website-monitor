<h1>Cadastrar Novo Site</h1>

<x-alerts/>

<form action={{ route('sites.store') }} method="POST">
    @csrf()
    <input type="text" name="url" placeholder="URL" id="">
    <button type="submit">Cadastrar</button>
</form>
