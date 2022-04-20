<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizRequest;
use App\Models\Question;

class QuizController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $quizes = Quiz::orderBy('id','DESC')->paginate(15);
    return view('quizes.index', compact('quizes'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('quizes.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(QuizRequest $request)
  {
    $addNewQuiz=Quiz::create($request->except('_token'));
    if(!$addNewQuiz){
      return back()->with('error', 'Error in upload Quiz!');
    }

    return back()->with('success', 'Quiz Successfully Added');
          
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
     public function show($id)
    {
      $quiz= Quiz::find($id);
      $totalQustions=Question::where('quiz_id', $id)->count()+ 1;
        return view('quizes.create_question', compact('quiz','totalQustions'));
    }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $quiz=Quiz::find($id);
    return view('quizes.edit',compact('quiz'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(QuizRequest $request, $id)
  {
    $quiz=Quiz::find($id);
    if(!$quiz){
            return back()->with('error', 'Error in upload Quiz!');

    }
    $editQuiz=Quiz::where('id', $quiz->id)->update($request->except('_token','_method'));
    if(!$editQuiz){
      return back()->with('error', 'Error in upload Quiz!');
    }

    return back()->with('success', 'Quiz Successfully Updated');

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