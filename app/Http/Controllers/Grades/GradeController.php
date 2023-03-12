<?php

namespace App\Http\Controllers;
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
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a  class="delete btn btn-danger btn-sm" data-id="' . $row->id . '">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }

        $grades = Grade::query()->get()->all();
        return view('pages.grades.index')->with('grades', $grades);
//        $this->data['grades'] = Grade::query()->get()->all() ;
//        return view('pages.grades.index',$this->data);

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


        return redirect('Grades');
//$validated = $request->validated();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

//        try {
//            Grade::find($id)->delete();
//            return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
//        }
//        catch (\Exception $ex){
//            return response(['message'=>$ex->getMessage(),'status'=>400]);
//        }
        $grade = Grade::find($id);
        $grade->delete();
        return redirect()->route('Grades.index')->with('success', 'Grade deleted successfully');
    }

    public function delete($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return redirect()->route('Grades.index')->with('success', 'Grade deleted successfully');

    }

}

?>
