    @csrf()
    <input type="text" name="url" placeholder="URL" value="{{ old('site') ?? $site->url }}">
    <button type="submit">Salvar</button>
