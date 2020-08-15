<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('index', compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:pertanyaan',
            'isi' => 'required'
        ]);

        // dd($request->all());

        $tags_arr = explode(',', $request["tags"]);

        
        $tag_ids = [];
        
        foreach ($tags_arr as $tag_name) {
            $tag = Tag::where("nama", $tag_name)->first();
            if ($tag) {
                $tag_ids[] = $tag->id;
            } else {
                $new_tag = Tag::create(["nama" => $tag_name]);
                // dd($new_tag);
                $tag_ids[] = $new_tag->id;
            }
        }

        $pertanyaan = Pertanyaan::create([
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);

        // dd($tag_ids);

        $pertanyaan->pertanyaanHasTag()->sync($tag_ids);


        // $pertanyaan->pertanyaanHasTag()->sync([$request->tag_id]);

        // dd($pertanyaan);

        return redirect()->route('pertanyaan.show', [$pertanyaan->id])
            ->with('success', 'Pertanyaan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $pertanyaan = Pertanyaan::findOrFail($id);
        return view('show', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        return view('edit', compact('pertanyaan'));
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

        $pertanyaan = Pertanyaan::findOrFail($id);

        $request->validate([
            'judul' => 'required|unique:pertanyaan,judul,' . $id,
            'isi' => 'required'
        ]);

        // dd($request->all());
        $pertanyaan->update([
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);

        return redirect()->route('pertanyaan.show', $id)
            ->with('success', 'Pertanyaan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id)->delete();

        return redirect()->route('pertanyaan.index')
            ->with('success', 'Pertanyaan berhasil dihapus');
    }
}
