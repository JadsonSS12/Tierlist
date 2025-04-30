<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tier List</title>
</head>
<body>

    <h2>Adicionar Novo Item</h2>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <label for="name">Nome do Item:</label>
        <input type="text" name="name" required>

        <label for="category_id">Categoria:</label>
        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Adicionar</button>
    </form>

   <!-- <form action="{{ route('items.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este item?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
-->

    <h1>Tier List</h1>
    <div class="tierlist">
        @foreach ($categories as $category)
            <div class="category">
                <h2>{{ $category->name }}</h2>
                <ul>
                    @foreach ($category->items as $item)
                        <li>{{ $item->name }}</li>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                        <a href="{{ route('items.edit', $item->id) }}">Editar</a>

                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</body>
</html>
