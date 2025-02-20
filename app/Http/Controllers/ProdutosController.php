<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function index()
    {
        // Usando o 'with' para carregar os produtos diretamente
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:produtos',
            'marca' => 'required',
            'produto' => 'required',
            'quantidade' => 'required|integer',
            'valor_unitario' => 'required|numeric',
            'margem_lucro' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Usando transações para garantir que tudo aconteça de forma segura
        DB::beginTransaction();

        try {
            $imagemPath = $request->hasFile('imagem') ? $request->file('imagem')->store('images', 'public') : null;
            
            $produto = Produto::create([
                'codigo' => $request->codigo,
                'marca' => $request->marca,
                'produto' => $request->produto,
                'quantidade' => $request->quantidade,
                'valor_unitario' => $request->valor_unitario,
                'margem_lucro' => $request->margem_lucro,
                'valor_venda' => $request->valor_unitario * (1 + $request->margem_lucro / 100), // Já calcula o valor de venda
                'imagem' => $imagemPath,
            ]);

            DB::commit(); // Commitando as transações

            return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack(); // Revertendo caso haja erro
            return back()->withErrors('Erro ao salvar produto: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Encontrando o produto de forma rápida com findOrFail
        return response()->json(Produto::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|unique:produtos,codigo,' . $id,
            'marca' => 'required',
            'produto' => 'required',
            'quantidade' => 'required|integer',
            'valor_unitario' => 'required|numeric',
            'margem_lucro' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Usando transações para garantir que tudo aconteça de forma segura
        DB::beginTransaction();

        try {
            $produto = Produto::findOrFail($id);
            
            $imagemPath = $produto->imagem;
            if ($request->hasFile('imagem')) {
                // Deletando a imagem antiga antes de salvar a nova
                if ($produto->imagem) {
                    Storage::disk('public')->delete($produto->imagem);
                }
                $imagemPath = $request->file('imagem')->store('images', 'public');
            }

            $produto->update([
                'codigo' => $request->codigo,
                'marca' => $request->marca,
                'produto' => $request->produto,
                'quantidade' => $request->quantidade,
                'valor_unitario' => $request->valor_unitario,
                'margem_lucro' => $request->margem_lucro,
                'valor_venda' => $request->valor_unitario * (1 + $request->margem_lucro / 100), // Já calcula o valor de venda
                'imagem' => $imagemPath,
            ]);

            DB::commit(); // Commitando as transações

            return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack(); // Revertendo caso haja erro
            return back()->withErrors('Erro ao atualizar produto: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        // Usando transações para garantir que tudo aconteça de forma segura
        DB::beginTransaction();

        try {
            $produto = Produto::findOrFail($id);
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $produto->delete();

            DB::commit(); // Commitando as transações

            return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack(); // Revertendo caso haja erro
            return back()->withErrors('Erro ao excluir produto: ' . $e->getMessage());
        }
    }
}
