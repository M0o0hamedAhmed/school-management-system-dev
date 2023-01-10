<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Model\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{


  public function index()
  {
$this->data['grades'] = Grade::query()->get()->all() ;
      return view('pages.grades.index',$this->data);

  }


  public function create()
  {
      return view('Grades');
  }


  public function store(StoreGradeRequest $request)
  {
$validated = $request->validated();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
