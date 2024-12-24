<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'reporter' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'post_date' => 'required|date',
        ]);

        // Jika ada gambar, upload dan simpan nama file
        $picture = $request->file('picture') ? $request->file('picture')->store('images') : null;

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'reporter' => $request->reporter,
            'source' => $request->source,
            'picture' => $picture,
            'post_date' => $request->post_date,
        ]);

        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'reporter' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'post_date' => 'required|date',
        ]);

        $picture = $request->file('picture') ? $request->file('picture')->store('images') : $news->picture;

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'reporter' => $request->reporter,
            'source' => $request->source,
            'picture' => $picture,
            'post_date' => $request->post_date,
        ]);

        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
