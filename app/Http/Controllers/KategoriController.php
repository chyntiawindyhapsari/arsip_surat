<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $kategori = Kategori::when($keyword, function ($query, $keyword) {
                            $query->where('nama_kategori', 'like', "%{$keyword}%");
                        })
                        ->orderBy('id_kategori', 'asc')
                        ->paginate(10); // <- penting: pake paginate

        return view('kategori.index', compact('kategori', 'keyword'));
    }

    public function create()
    {
        $nextId = DB::select("SHOW TABLE STATUS LIKE 'kategori'")[0]->Auto_increment;
        return view('kategori.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori'=>'required']);
        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate(['nama_kategori'=>'required']);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return back()->with('success','Kategori dihapus');
    }
}
