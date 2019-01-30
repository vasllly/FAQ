<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Question;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = NULL;
        foreach (Theme::all() as $theme) {
            foreach ($theme->questions as $question) {
                if ($question->published) {
                    $questions[$theme->name][] = $question;
                }
            }
        }

        return view('site.index', ['all_questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.create', ['themes' => Theme::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        Question::create([
            'text' => $request['text'],
            'author' => $request['author'],
            'email' => $request['email'],
            'theme_id' => $request['theme_id'],
        ]);

        return redirect()->route('index')->with('status', 'Спасибо за вопрос! Мы на него скоро ответим.');
    }
}
