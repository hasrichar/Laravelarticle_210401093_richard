<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;



class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author', 'category')->get();
        $authors = Author::all();
        $categories = Category::all();

        return View::make('articles.index', compact('articles', 'authors', 'categories'));
    }


    
    public function create()
{
    $authors = Author::all();
    $categories = Category::all();

    return view('articles.create', compact('authors', 'categories'));
}

    

public function store(Request $request)
{
    try {
        $request->validate([
            'nama' => 'required|max:255',
            'comment' => 'required',
            'author' => 'required', 
            'category_id' => 'required|exists:categories,id',
        ]);

        $author = Author::firstOrCreate(['name' => $request->input('author')]);

        // Simpan data baru
        Article::create([
            'nama' => $request->input('nama'),
            'comment' => $request->input('comment'),
            'author_id' => $author->id,
            'category_id' => $request->input('category_id'),
        ]);

        // Redirect atau tampilkan pesan
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
    }
}

    

    

public function edit($id)
{
    $article = Article::findOrFail($id);
    $authors = Author::all();
    $categories = Category::all();

    return view('articles.edit', compact('article', 'authors', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|max:255',
        'comment' => 'required',
        'author_id' => 'required|exists:authors,id',
        'category_id' => 'required|exists:categories,id',
    ]);

    $article = Article::findOrFail($id);

    $authorId = $request->input('author_id') == '0' ? null : $request->input('author_id');

    $article->update([
        'nama' => $request->input('nama'),
        'comment' => $request->input('comment'),
        'author_id' => $authorId,
        'category_id' => $request->input('category_id'),
    ]);

    return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
}



    public function destroy($id)
{
    $article = Article::findOrFail($id);
    $article->delete();
    
    return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
}
public function showCategories()
{
    $categories = Category::all();
    return view('modifikasicategory', compact('categories'));
}
}
