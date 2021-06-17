<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = DB::table('produtos')->get();

        // Formata o valor da moeda para o tipo PT-BR
        foreach ($produtos as $produto) {
            $produto->valor = number_format($produto->valor, 2, ',', '.');
        }

        return view('listar', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao' => 'required|min:3|max:255',
            'valor' => 'required|numeric',
            'quantidade' => 'required|numeric'
        ]);

        $validated['slug'] = $this->criarSlug($validated['descricao']);

        $isOk = DB::table('produtos')->insert($validated);

        if (! $isOk) {
            return response()->with('mensagem', 'Erro ao adicionar produto');
        }

        return redirect('produtos')->with('mensagem', 'Produto adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isOk = DB::table('produtos')->delete($id); 


        if (! $isOk) {
            return redirect('produtos')->with('mensagem','Produto inexistente!');
        }
        

        return redirect('produtos')->with('mensagem', 'Produto removido com sucesso!'); 
    }

    /**
     * Create a slug string.
     *
     * @param  string  $descricao
     * @return string
     */
    private function criarSlug($descricao)
    {
        if (str_word_count($descricao, 0) <= 1){
            return $descricao;
        }

        return str_replace(' ', '-', $descricao);
    }
}
