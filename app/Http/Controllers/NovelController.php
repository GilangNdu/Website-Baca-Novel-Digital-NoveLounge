<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class NovelController extends Controller
{
    public function cetak()
    {
        $novels = Novel::all();
        $pdf = Pdf::loadview('novel.novel-cetak', compact('novels'));
        return $pdf->download('laporan-novel.pdf');
    }

    
    public function index()
    {
        $novels = Novel::orderBy('id_novel', 'desc')->get();
        return view('novel.index', compact('novels'));
    }

    public function create()
    {
         $kategori = ['Romantis', 'Komedi', 'Fantasi', 'Action']; 
        return view('novel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:200',
            'penulis' => 'required|max:150',
            'cover' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori' => 'required|max:100',
            'sinopsis' => 'required',
            'cerita_lengkap' => 'required'
        ]);

        // upload cover
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $file->move(public_path('cover'), $filename);
        }

        Novel::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'cover' => $filename, // simpan nama file
            'kategori' => $request->kategori,
            'sinopsis' => $request->sinopsis,
            'cerita_lengkap' => $request->cerita_lengkap,
            'jumlah_dibaca' => 0
        ]);

        return redirect('/novel')->with('success', 'Novel berhasil ditambahkan!');
    }

    public function edit($id_novel)
    {
        $novel = Novel::find($id_novel);
        return view('novel.edit', compact('novel'));
    }

    public function update(Request $request, $id_novel)
    {
        $request->validate([
            'judul' => 'required|max:200',
            'penulis' => 'required|max:150',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori' => 'required|max:100',
            'sinopsis' => 'required',
            'cerita_lengkap' => 'required'
        ]);

        $novel = Novel::find($id_novel);
        $filename = $novel->cover; // default: cover lama

        // upload cover baru (jika ada)
        if ($request->hasFile('cover')) {
            // hapus cover lama
            $oldPath = public_path('cover/' . $novel->cover);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // upload cover baru
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('cover'), $filename);
        }

        $novel->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'cover' => $filename,
            'kategori' => $request->kategori,
            'sinopsis' => $request->sinopsis,
            'cerita_lengkap' => $request->cerita_lengkap
        ]);

        return redirect('/novel')->with('success', 'Novel berhasil diperbarui!');
    }

    public function destroy($id_novel)
    {
        $novel = Novel::find($id_novel);

        // hapus cover dari folder
        $path = public_path('cover/' . $novel->cover);
        if (File::exists($path)) {
            File::delete($path);
        }

        // hapus record
        $novel->delete();

        return redirect('/novel')->with('success', 'Novel berhasil dihapus!');
    }
}
