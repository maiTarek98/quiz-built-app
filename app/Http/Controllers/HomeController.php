<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\UserQuiz;
use App\Models\Question;
use App\Models\UserAnswer;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   

    public function take_quiz($quiz){
        $get_quiz= Quiz::where('status','show')->findOrFail($quiz);
        if($get_quiz){
            $user_quiz= UserQuiz::where('user_id', Auth::user()->id)->where('quiz_id', $get_quiz->id)->first();
            if($user_quiz){
                return redirect()->route('show_result', $quiz);

            }

            UserQuiz::updateOrCreate([
                'user_id' => Auth::user()->id,
                'quiz_id' => $get_quiz->id,
            ]);
            return redirect()->route('quiz_questions',[$quiz, 0]);
         
        }else{
            return redirect()->back();
        }
    }

    public function show_quiz_questions($quiz, $current_q = 0){
       $get_quiz= Quiz::where('status','show')->findOrFail($quiz);
        $question_id = Question::where('quiz_id', $get_quiz->id)->pluck('id')->toArray();
        if ($current_q < count($question_id)) {
            $question = Question::find($question_id[$current_q]);

            $next_q = $current_q + 1;
            // dd($next_q);
            return view('questions', compact('get_quiz', 'question', 'next_q'));
        }else {
            return back()->with('error', 'Questions not found');
        }

    }

    public function store_answer(Request $request)
    {
            $quiz_id = $request->quiz_id;
            $get_correctOption = Question::where('id', $request->question_id)
                ->select('correct_option')->first();

            $user_answers =UserAnswer::create([
                'user_id' => Auth::user()->id,
                'quiz_id' => $quiz_id,
                'question_id' => $request->question_id,
                'user_answer' => $request->user_answer,
                'check_answer' => ($get_correctOption->correct_option == $request->user_answer) ? 'yes' : 'no' ,
            ]);
            if($user_answers){
                if($request->next_q != 0) {
                    return redirect()->route('quiz_questions', [$quiz_id, $request->next_q]);
                }
                return redirect()->route('show_result', $quiz_id);
            }
            else{
                return back()->with('error', 'Choose an option!');
            }
        }


    public function show_result($quiz)
    {
        $user_id = Auth::user()->id;
        $get_quiz= Quiz::where('status','show')->findOrFail($quiz);

        $questions = UserAnswer::where('user_id', '=', $user_id)->where('quiz_id', $get_quiz->id)->get();
        $correct_answers = $questions->where('check_answer','yes')->count();

        $totalMarks = $get_quiz->score_question * $get_quiz->no_question;
        $userMarks = $get_quiz->score_question * $correct_answers;

        UserQuiz::where('user_id', '=', $user_id)->where('quiz_id', $get_quiz->id)->update(['score' => $userMarks]);

        $findPercentage = $userMarks / $totalMarks * 100;
        $result = $findPercentage >= $get_quiz->passing_score ? 'Pass' : 'Fail';

        return view('show_result', compact( 'questions','get_quiz','correct_answers','findPercentage','result'));
    }

}
