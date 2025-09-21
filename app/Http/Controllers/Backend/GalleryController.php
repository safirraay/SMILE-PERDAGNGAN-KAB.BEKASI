<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman daftar galeri.
     */
    public function index()
    {
        $data = [
            'title' => 'Manajemen Galeri',
        ];
        return view('backend.gallery.index', $data);
    }

    /**
     * Mengambil data untuk DataTables.
     */
    public function getData(Request $request)
    {
        $query = Gallery::latest();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('image_preview', function ($row) {
                $imageUrl = Storage::url($row->image);
                return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="100">';
            })
            ->addColumn('action', function ($row) {
                $viewUrl = route('gallery.show', $row->id);
                $editUrl = route('gallery.edit', $row->id);
                $btn = '<a href="' . $viewUrl . '" class="btn btn-sm btn-info" title="Lihat Detail"><i class="fas fa-eye"></i></a> ';
                $btn .= '<a href="' . $editUrl . '" class="btn btn-sm btn-primary" title="Edit Data"><i class="fas fa-edit"></i></a> ';
                $btn .= '<button onclick="deleteGallery(' . $row->id . ')" class="btn btn-sm btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['image_preview', 'action'])
            ->make(true);
    }

    /**
     * Menampilkan form untuk membuat data galeri baru.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Foto Galeri Baru',
        ];
        return view('backend.gallery.create', $data);
    }

    /**
     * Menyimpan data galeri baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('gallery.create')->withErrors($validator)->withInput();
        }

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Foto galeri baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data galeri.
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        $data = [
            'title'   => 'Detail Foto Galeri',
            'gallery' => $gallery,
        ];
        return view('backend.gallery.show', $data);
    }

    /**
     * Menampilkan form untuk mengedit data galeri.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $data = [
            'title'   => 'Edit Foto Galeri',
            'gallery' => $gallery,
        ];
        return view('backend.gallery.edit', $data);
    }

    /**
     * Memperbarui data galeri di database.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('gallery.edit', $id)->withErrors($validator)->withInput();
        }

        $imagePath = $gallery->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Data galeri berhasil diperbarui.');
    }

    /**
     * Menghapus data galeri dari database.
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus gambar dari storage
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        // Hapus data dari database
        $gallery->delete();

        return response()->json(['success' => 'Data galeri berhasil dihapus.']);
    }
}
