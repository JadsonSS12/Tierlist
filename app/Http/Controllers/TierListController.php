<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class TierListController extends Controller
{
    public function index()
    {
        $categories = Category::with('items')->get();
        return view('tierlist.index', compact('categories'));
    }



    public function store(Request $request)
    {
        // Validação para garantir que a categoria é uma das permitidas
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Criar o item no banco de dados
        Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

       
    
        return redirect()->route('index')->with('success', 'Item adicionado com sucesso!');
    }

    public function destroy($id){
        $item = Item::find($id);

        if(!$item){
            return redirect()->back()->with("Item não encontrado ");
        }

        $item->delete();
        return redirect()->route('index')->with("sucess", 'Item deletado com sucesso');

    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('tierlist.edit', compact('item'));
    }

    public function update(Request $request, $id){
        $item = Item::find($id);

        if(!$item){
            return redirect()->back()->with("item não encontrado");
        }

        /*$request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|between:1,5', // As categorias são A, B, C, D ou S (1 a 5)
        ]);
*/
        $item->update([
            'name' => $request->name,
            'category_id'=> $request->category_id,
        ]);

        return redirect()->route('tierlist.index')->with('success', 'Item atualizado com sucesso!');
    }

}
