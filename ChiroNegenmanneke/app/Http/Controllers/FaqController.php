<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\AdminMiddelware::class)->except('index');
    }

    public function index()
    {
        $categories = FaqCategory::with('questions')->get(); 
        return view('faq.faq', compact('categories')); 
    }

    public function createCategory()
    {
        return view('faq.createCategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'Categorie toegevoegd!');
    }

    public function editCategory($id)
    {
        $category = FaqCategory::findOrFail($id);
        return view('faq.editCategory', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = FaqCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'Categorie bijgewerkt!');
    }

    public function destroyCategory($id)
    {
        $category = FaqCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Categorie verwijderd!');
    }

    public function createQuestion($categoryId)
    {
        $category = FaqCategory::findOrFail($categoryId);
        return view('faq.createQuestion', compact('category'));
    }

    public function storeQuestion(Request $request, $categoryId)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqQuestion::create([
            'category_id' => $categoryId,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'Vraag toegevoegd!');
    }

    public function editQuestion($id)
    {
        $question = FaqQuestion::findOrFail($id);
        return view('faq.editQuestion', compact('question'));
    }

    public function updateQuestion(Request $request, $id)
    {
        $question = FaqQuestion::findOrFail($id);
        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'Vraag bijgewerkt!');
    }

    public function destroyQuestion($id)
    {
        $question = FaqQuestion::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Vraag verwijderd!');
    }
}
