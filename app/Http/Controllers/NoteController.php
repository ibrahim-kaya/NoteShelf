<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'note' => 'required|string',
            'color' => 'required|integer',
            'icon' => 'required|integer|exists:note_icons,id',
            'privacy' => 'required|string|in:public,private',
        ], [
            'title.required' => 'Başlık alanı boş bırakılamaz!',
            'title.string' => 'Başlık alanı geçersiz!',
            'title.max' => 'Başlık alanı en fazla 255 karakter olabilir!',
            'note.required' => 'Not alanı boş bırakılamaz!',
            'note.string' => 'Not alanı geçersiz!',
            'color.required' => 'Renk alanı boş bırakılamaz!',
            'color.integer' => 'Renk alanı geçersiz!',
            'icon.required' => 'Simge alanı boş bırakılamaz!',
            'icon.integer' => 'Simge alanı geçersiz!',
            'icon.exists' => 'Simge alanı geçersiz!',
            'privacy.required' => 'Gizlilik alanı boş bırakılamaz!',
            'privacy.string' => 'Gizlilik alanı geçersiz!',
            'privacy.in' => 'Gizlilik alanı geçersiz!',
        ]);

        $colors = [
            1 => '#60a5fa',
            2 => '#818cf8',
            3 => '#4ade80',
            4 => '#facc15'
        ];

        if(!array_key_exists($request->color, $colors)) return response()->json(['message' => 'Geçersiz renk değeri!', [
            'color' => 'Renk alanı geçersiz!'
        ]], 422);


        $note = new Note();
        $note->icon_id = $request->icon;
        $note->title = $request->title;
        $note->note = $request->note;
        $note->user_id = auth()->user()->id;
        $note->color = $colors[$request->color];
        $note->password = $request->password ?? null;
        $note->visibility = $request->privacy;
        if($note->save()) return response()->json(['status' => 'success', 'message' => 'Not başarıyla oluşturuldu!'], 200);
        return response()->json(['status' => 'error', 'message' => 'Not oluşturulamadı!'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
