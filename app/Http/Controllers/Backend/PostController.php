<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Menampilkan halaman daftar berita & pengumuman.
     */
    public function index()
    {
        $data = [
            'title'        => 'Manajemen Berita & Pengumuman',
            'total'        => Post::count(),
            'berita'       => Post::where('category', 'Berita')->count(),
            'pengumuman'   => Post::where('category', 'Pengumuman')->count(),
            'published'    => Post::whereNotNull('published_at')->count(),
        ];
        return view('backend.posts.index', $data);
    }

    /**
     * Mengambil data untuk DataTables.
     */
    public function getData(Request $request)
    {
        $query = Post::with('user')->latest();

        if ($request->filled('category') && $request->category !== 'semua') {
            $query->where('category', $request->category);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('author', function ($row) {
                return $row->user->name ?? 'N/A';
            })
            ->editColumn('title', function ($row) {
                return Str::limit($row->title, 50);
            })
            ->editColumn('published_at', function ($row) {
                if ($row->published_at) {
                    return '<span class="badge badge-success">Published</span><br><small>' . $row->published_at->isoFormat('D MMM Y, HH:mm') . '</small>';
                }
                return '<span class="badge badge-secondary">Draft</span>';
            })
            ->addColumn('action', function ($row) {
                $viewUrl = route('posts.show', $row->id);
                $editUrl = route('posts.edit', $row->id);
                $btn = '<a href="' . $viewUrl . '" class="btn btn-sm btn-info" title="Lihat"><i class="fas fa-eye"></i></a> ';
                $btn .= '<a href="' . $editUrl . '" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a> ';
                $btn .= '<button onclick="deletePost(' . $row->id . ')" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['published_at', 'action'])
            ->make(true);
    }

    /**
     * Menampilkan form untuk membuat postingan baru.
     */
    public function create()
    {
        $data = [
            'title' => 'Tulis Berita / Pengumuman Baru',
        ];
        return view('backend.posts.create', $data);
    }

    /**
     * Menyimpan postingan baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255|unique:posts,title',
            'category'    => 'required|in:Berita,Pengumuman',
            'body'        => 'required|string|min:20',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')->withErrors($validator)->withInput();
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id'      => Auth::id(),
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'category'     => $request->category,
            'body'         => $request->body,
            'image'        => $imagePath,
            'published_at' => $request->has('publish') ? now() : null,
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan baru berhasil dibuat.');
    }

    /**
     * Menampilkan detail satu postingan.
     */
    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        $data = [
            'title' => 'Detail Berita / Pengumuman',
            'post'  => $post,
        ];
        return view('backend.posts.show', $data);
    }

    /**
     * Menampilkan form untuk mengedit postingan.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $data = [
            'title' => 'Edit Berita / Pengumuman',
            'post'  => $post,
        ];
        return view('backend.posts.edit', $data);
    }

    /**
     * Memperbarui data postingan di database.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title'       => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'category'    => 'required|in:Berita,Pengumuman',
            'body'        => 'required|string|min:20',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.edit', $id)->withErrors($validator)->withInput();
        }

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'category'     => $request->category,
            'body'         => $request->body,
            'image'        => $imagePath,
            'published_at' => $request->has('publish') ? ($post->published_at ?? now()) : null,
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diperbarui.');
    }

    /**
     * Menghapus postingan dari database.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return response()->json(['success' => 'Postingan berhasil dihapus.']);
    }
}
