<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Album::select('*');
            return DataTables::of($data)->addColumn('action', function ($row) {
                $btn = '<a  class="delete btn btn-danger btn-sm" data-id="' . $row->id . '">Delete</a>
                        <a  class="edit btn btn-primary btn-sm" data-id="' . $row->id . '" data-toggle="modal" data-target="#editModal">Edit</a>
                         <a  class="show btn btn-info btn-sm" data-id="' . $row->id . '" href="' . route("album.show",$row->id) . '" >Show</a>';
                return $btn;
            })->rawColumns(['action'])->addIndexColumn()->make(true);
        }

        $this->data['albums'] = Album::query()->get()->all();



        return view('album.index')->with('grades', $this->data);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $album = Album::query()->create([
            'name' => $request->Name,
            'user_id' => Auth::user()->id
        ]);
        foreach ($request->document as $key) {
            $project = Picture::query()->create([
                'original_filename' => $key,
                'name' => 'name',
                'album_id' => $album->id
            ]);
        }

        return response()->json(['success' => 'Post deleted successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['pictures'] = Picture::query()->where('album_id',$id)->get();
        return view('album.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::find($id)->delete();
        return response()->json(['success' => 'Post deleted successfully.']);
    }
}
