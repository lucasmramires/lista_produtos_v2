<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stock;
use App\Exceptions\Handler;


 
class StockController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response //mostra a lista de produtos
     */
    public function index()
    {
        $stocks = Stock::all();
 
        return view('stocks.index', compact('stocks')); // resources/views/stocks/index.blade.php 
    }
 
    /**
     * mostra o formulario de criacao de um novo produto
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocks.create'); // -> resources/views/stocks/create.blade.php
    }
 
    /**
     * armazena o novo produto criado
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
        // valida os campos requeridos
        $request->validate([
            'product_name'=>'required',
            'description'=>'required',
            'quantity'=>'required|max:10'
        ]); 

        // coleta os valores preenchidos no formulario
        $stock = new Stock([
            'product_name' => $request->get('product_name'),
            'description' => $request->get('description'),
            'quantity' => $request->get('quantity')
        ]); 
        $stock->save();
        DB::commit();
        return redirect('/stocks')->with('success', 'Produto salvo.');   // resources/views/stocks/index.blade.php

        } catch (\Exception $e) {
        throw new \Exception("Erro ao adicionar o produto.", 400);
        DB::rollBack();
        }
    }
 
    /**
     * mostra o formulario de edicao de um produto especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stocks.edit', compact('stock'));  // resources/views/stocks/edit.blade.php
    }
 
    /**
     * atualiza um produto especifico
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
        // valida os campos requeridos
        $request->validate([
            'product_name'=>'required',
            'description'=>'required',
            'quantity'=>'required|max:10'
        ]); 
        $stock = Stock::find($id);
        // coleta os valores preenchidos no formulario
        $stock->product_name =  $request->get('product_name');
        $stock->description = $request->get('description');
        $stock->quantity = $request->get('quantity');
        $stock->save();
        DB::commit();
        return redirect('/stocks')->with('success', 'Produto atualizado.'); // resources/views/stocks/index.blade.php

        } catch (\Exception $e) {
        throw new \Exception("Erro ao editar o produto.", 400);
        DB::rollBack();
        }
    }
 
    /**
     * remove um produto especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
        $stock = Stock::find($id);
        $stock->delete();
        DB::commit();
        return redirect('/stocks')->with('success', 'Produto removido.');  // resources/views/stocks/index.blade.php

        } catch (\Exception $e) {
        throw new \Exception("Não foi possível deletar o produto.", 1);
        DB::rollBack();
        }
    } 
}