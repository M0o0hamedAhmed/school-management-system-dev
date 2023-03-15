<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Model\Grade;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GradeController extends Controller
{


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Grade::select('*');
            return DataTables::of($data)->addColumn('action', function ($row) {
                $btn = '<a  class="delete btn btn-danger btn-sm" data-id="' . $row->id . '">Delete</a>
                            <a  class="edit btn btn-primary btn-sm" data-id="' . $row->id . '" data-toggle="modal" data-target="#editModal">Edit</a>';
                return $btn;
            })->rawColumns(['action'])->addIndexColumn()->make(true);
        }

        $grades = Grade::query()->get()->all();
        return view('pages.grades.index')->with('grades', $grades);
    }


    public function create()
    {
        return view('Grades');
    }


    public function store(StoreGradeRequest $request)
    {

        Grade::query()->create([
            'Notes' => $request->Notes,
            'Name' => [
                'ar' => $request->Name,
                'en' => $request->Name_en]]);
//        return redirect()->route('companies.index')->with('success','Company has been created successfully.');
        return response()->json(['success' => 'Post deleted successfully.']);
//        return redirect('Grades');
    }


    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Grade::find($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(StoreGradeRequest $request,$id)
    {
        Grade::query()->find($id)->update([
            'Notes' => $request->Notes,
            'Name' => [
                'ar' => $request->Name,
                'en' => $request->Name_en]]);
        return response()->json(['success' => 'Post deleted successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Grade::find($id)->delete();
        return response()->json(['success' => 'Post deleted successfully.']);
//        return redirect()->route('Grades.index')->with('success', 'Grade deleted successfully');
    }


}

?>
