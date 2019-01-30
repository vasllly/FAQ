<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Theme;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'answer' => 'required|string',
        ]);

        $id = $request['id'];
        $question = Question::find($id);

        $question->answer = $request['answer'];

        if ($request['published']) {
            $question->published = TRUE;
            $question->save();
        }

        return redirect()->route('themes.show', [$id => $question->theme->id])->with('status', 'Ответ на вопрос с id=' . $id . ' получен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $question->published = !$question->published;
        $question->save();

        return redirect()->back()->with('status', 'Вопрос ' . ($question->published ? 'опубликован' : 'скрыт') . '!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.questions.edit', ['question' => Question::find($id), 'themes' => Theme::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required|string|max:255',
            'answer' => 'required|string',
            'author' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        Question::find($id)->update([
            'text' => $request['text'],
            'answer' => $request['answer'],
            'author' => $request['author'],
            'email' => $request['email'],
            'theme_id' => $request['theme_id'],
        ]);

        return redirect()->route('themes.show', [$id => $request['theme_id']])->with('status', 'Вопрос с id=' . $id . ' изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect()->back()->with('status', 'Вопрос удален!');
    }

    public function answer($id)
    {
        return view('admin.questions.answer', ['question' => Question::find($id)]);
    }
}
