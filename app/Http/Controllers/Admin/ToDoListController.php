<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Task::query()->where([['user_id', Auth::user()->id],['status','to_do']]);
            return  DataTables::of($data)
                ->editColumn('created_at', function ($row) {
                    try {
                        return $row->created_at->diffForHumans();
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
                ->addColumn('actions', function ($row) {
                    return "
                    <div class='d-flex gap-3'>
                    <a href='javascript:void(0);' class='text-info change_status' data-id='" . $row->id . "'> <i class='mdi mdi-pencil font-size-18 ti-check'></i></a>
                   </div>
                   ";
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('pages.todolist.index');
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Task::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'to_do',
            'user_id' => Auth::user()->id
        ]);

        return response()->json(
            [
                'status'  => 200,
                'message' => "Data Added Successfully"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function changeStatus($id)
    {
        Task::query()->findOrFail($id)->update([
            'status' => 'done'
        ]);
        return response()->json(
            [
                'status'  => 200,
                'message' => "The task has been completed successfully"
            ]);
//        return view('pages.todolist.index');
//        return 'change_status'.$id;
    }

    public  function done(Request $request){
        if ($request->ajax()) {
            $data = Task::query()->where([['user_id', Auth::user()->id],['status','to_do']]);
            return DataTables::of($data)
                ->editColumn('created_at', function ($row) {
                    try {
                        return $row->created_at->diffForHumans();
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
//                ->editColumn('image', function ($row) {
//                    return ' <img src="' . getUserImage($row->image) . '" class="avatar-xs rounded-circle" onclick="window.open(this.src)">';
//                })
                ->addColumn('actions', function ($row) {
                    return "
                    <div class='d-flex gap-3'>
                    <a href='javascript:void(0);' class='text-info change_status' data-id='" . $row->id . "'> <i class='mdi mdi-pencil font-size-18 ti-check'></i></a>
                   </div>
                   ";
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('pages.todolist.index');
    }
}
