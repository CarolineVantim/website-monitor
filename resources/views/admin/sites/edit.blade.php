<h1>Alterar Site</h1>

<x-alerts/>

<form action={{ route('sites.update', $site->id) }} method="POST">
    @method('PUT')
    @include('admin/sites/partials/form')
</form>

<form action="{{ route('sites.destroy', $site->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>
