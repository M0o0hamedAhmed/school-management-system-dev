<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\Picture;
use Illuminate\Http\Request;

class DropZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project =  Picture::query()->create([
            'name' => 'name',
            'album_id' => 1
        ]);
        foreach ($request->document as $key) {
            $project =  Picture::query()->create([
                'original_filename' => $key,
                'name' => 'name',
                'album_id' => 1
            ]);
        }
//        $project = Picture::create($request->all());

//        foreach ($request->input('document', []) as $file) {
//            $project = Picture::query()->where('original_filename', $file)->first();
//            $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
//        }

        return redirect()->route('dropzone.index');
    }


    public function update(Request $request, Picture $project)
    {
        $project->update($request->all());

        if (count($project->document) > 0) {
            foreach ($project->document as $media) {
                if (!in_array($media->file_name, $request->input('document', []))) {
                    $media->delete();
                }
            }
        }

        $media = $project->document->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
            }
        }

        return redirect()->route('admin.projects.index');
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());
//        $name = 'x.'.$file->getClientOriginalExtension();


        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
            'request' => $request->input('Name1')
        ]);
    }

    public function index()
    {
        return view('dropzone.create');
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
