<?php
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    // Show all news
    public function index()
    {
        $newsItems = News::all();
        return view('news.index', compact('newsItems'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->publication_date = Carbon::parse($newsItem->publication_date);

        return view('news.show', compact('newsItem'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('news_images', 'public');

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'publication_date' => now(),
        ]);

        return redirect()->route('news.index')->with('success', 'News item created successfully!');
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.edit', compact('newsItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newsItem = News::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($newsItem->image);
            $imagePath = $request->file('image')->store('news_images', 'public');
            $newsItem->image = $imagePath;
        }

        $newsItem->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')->with('success', 'News item updated successfully!');
    }

    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);

        Storage::disk('public')->delete($newsItem->image);

        $newsItem->delete();

        return redirect()->route('news.index')->with('success', 'News item deleted successfully!');
    }
}
