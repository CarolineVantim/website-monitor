<h1>Alterar Site</h1>

<x-alerts/>

<form action={{ route('sites.update', $site->id) }} method="POST">
    @method('PUT')
    @include('admin/sites/partials/form')
</form>
