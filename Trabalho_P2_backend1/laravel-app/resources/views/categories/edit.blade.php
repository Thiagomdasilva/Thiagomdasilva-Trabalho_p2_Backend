<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        form { max-width: 600px; }
        label { display:block; margin-top: 1rem; }
        input[type=text], textarea { width: 100%; padding: 0.5rem; }
        .errors { color: darkred; }
        a.button, button { padding: 0.5rem 0.75rem; border: 1px solid #222; background: #fff; cursor: pointer; text-decoration:none; }
    </style>
</head>
<body>
    <h1>Editar Categoria</h1>
    <a class="button" href="{{ route('categories.index') }}">Voltar</a>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        <label>Nome
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        </label>
        <label>Descrição (opcional)
            <textarea name="description">{{ old('description', $category->description) }}</textarea>
        </label>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>