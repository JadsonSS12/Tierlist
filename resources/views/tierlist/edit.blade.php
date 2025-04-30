@extends('layouts.app')

@section('content')
    <h2>Editar Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome do Item:</label>
        <input type="text" id="name" name="name" value="{{ $item->name }}" required>

        <label for="category_id">Categoria:</label>
        <select id="category_id" name="category_id" required>
            <option value="1" {{ $item->category_id == 1 ? 'selected' : '' }}>A</option>
            <option value="2" {{ $item->category_id == 2 ? 'selected' : '' }}>B</option>
            <option value="3" {{ $item->category_id == 3 ? 'selected' : '' }}>C</option>
            <option value="4" {{ $item->category_id == 4 ? 'selected' : '' }}>D</option>
            <option value="5" {{ $item->category_id == 5 ? 'selected' : '' }}>S</option>
        </select>

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('tierlist.index') }}">Voltar</a>
@endsection
