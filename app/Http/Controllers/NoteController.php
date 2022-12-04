<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteIcon;
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
            'color' => 'required|integer|exists:note_colors,id',
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
            'color.in' => 'Renk alanı geçersiz!',
            'icon.required' => 'Simge alanı boş bırakılamaz!',
            'icon.integer' => 'Simge alanı geçersiz!',
            'icon.exists' => 'Simge alanı geçersiz!',
            'privacy.required' => 'Gizlilik alanı boş bırakılamaz!',
            'privacy.string' => 'Gizlilik alanı geçersiz!',
            'privacy.in' => 'Gizlilik alanı geçersiz!',
        ]);


        $note = new Note();
        $note->icon_id = $request->icon;
        $note->title = $request->title;
        $note->note = $request->note;
        $note->user_id = auth()->user()->id;
        $note->color = $request->color;
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
        $note = Note::find($id) ?? abort(404);
        if($note->visibility == 'private' && $note->user_id != auth()->user()->id) return view('pages.note', ['status' => 'error', 'message' => 'Bu notu görüntüleme yetkiniz yok!']);
        if($note->password != null) return view('pages.note', ['status' => 'locked', 'message' => 'Bu not şifreli!']);

        return view('pages.note', ['status' => 'success', 'note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $note = Note::find($id) ?? abort(404);
        if($note->user_id != auth()->user()->id) return view('pages.edit-note', ['status' => 'error', 'message' => 'Bu notu düzenleme yetkiniz yok!']);

        $icons = NoteIcon::all();
        return view('pages.edit-note', ['status' => 'success', 'note' => $note, 'icons' => $icons]);

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

    public function getNote(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:notes,id',
        ], [
            'id.required' => 'Istek gecersiz!',
            'id.integer' => 'Istek gecersiz!',
            'id.exists' => 'Istek gecersiz!'
        ]);

        $note = Note::find($request->id);

        if ($note->password != null) {
            if ($request->password != $note->password) {
                return response()->json(['status' => 'error', 'message' => 'Şifre hatalı!'], 422);
            }
        }

        return response()->json(['status' => 'success', 'note' => view('includes.show-note-modal', ['note' => $note])->render(), 'title' => $note->title], 200);
    }
}
