<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Support\Carbon;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $arsips = Arsip::with('kategori')
            ->when($keyword, function($q) use ($keyword){
                $q->where('judul','like','%'.$keyword.'%');
            })
            ->orderBy('id_arsip','desc') // ✅ ganti latest() dengan orderBy
            ->paginate(10);

        return view('arsip.index', compact('arsips','keyword'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:200',
            'judul' => 'required|string|max:200',
            'id_kategori' => 'required|integer',
            'file_pdf' => 'required|mimes:pdf|max:2048'
        ]);

        $fileName = time().'.'.$request->file_pdf->extension();
        $request->file_pdf->move(public_path('uploads'), $fileName);

        Arsip::create([
            'nomor_surat' => $request->nomor_surat,
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'file_pdf' => $fileName
        ]);


        return redirect()->route('arsip.index')->with('success','Data berhasil disimpan');
    }

    public function destroy(Arsip $arsip)
    {
        if(file_exists(public_path('uploads/'.$arsip->file_pdf))){
            unlink(public_path('uploads/'.$arsip->file_pdf));
        }
        $arsip->delete();
        return back()->with('success','Data berhasil dihapus');
    }

    public function show(Arsip $arsip)
    {
        return view('arsip.show', compact('arsip'));
    }

    // menampilkan halaman edit
    public function edit(Arsip $arsip)
    {
        $kategori = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    // update data arsip
    public function update(Request $request, Arsip $arsip)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:200',
            'judul' => 'required|string|max:200',
            'id_kategori' => 'required|integer',
            'file_pdf' => 'nullable|mimes:pdf|max:2048'
        ]);

        $data = [
            'nomor_surat' => $request->nomor_surat,
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'tanggal_upload' => now(), // otomatis update tanggal
        ];

        if($request->hasFile('file_pdf')){
            if(file_exists(public_path('uploads/'.$arsip->file_pdf))){
                unlink(public_path('uploads/'.$arsip->file_pdf));
            }
            $fileName = time().'.'.$request->file_pdf->extension();
            $request->file_pdf->move(public_path('uploads'), $fileName);
            $data['file_pdf'] = $fileName;
        }

        $arsip->update($data);

        return redirect()->route('arsip.index')->with('success','Data berhasil diperbarui');
    }

}
