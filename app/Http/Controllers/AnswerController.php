<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Customer;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
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
     * @param  \Illuminate\Http\AnswerRequest   $answerRequest
     * @return \Illuminate\Http\Response
     */
    //this function takes a variable of type AnswerRequest as parameters
    //Allows you to insert all the answers of a respondent
    public function store(AnswerRequest $answerRequest)
    {
        //  create a unique identifier
        $single_link = Str::uuid()->toString();
        //  get email
        $email = $answerRequest->answer1;
        $email = Customer::all()->where("email", $email)->pluck("email")->implode('0 => ',);
        //  chech if email exists
        if($email){
            // if exists return message
            $questions = Question::all();
            $mail="L'adresse email existe déjà";
            return view('front.index', ['mail' => $mail,'questions'=> $questions]);
        }else{
            // create a custermer
            $Customer = Customer::create([
                'email' => $answerRequest->answer1,
            ]);
            $customers = Customer::all();
            // get id custormer
            foreach($customers as $customer) {
                $emailId= Customer::Email($customer->email)->pluck('id');
            }
            $questions = Question::all();
            // insert all answers
            foreach ($questions as $key => $question) {
                $answer = new Answer();
                $answer->answer = $answerRequest->input('answer'.$question->id);
                $answer->question_id = $key + 1;
                $answer->customer_id =$emailId[0];
                $answer->single_link = $single_link;
                $answer->save();
                }
            return redirect('/message')->with('url', $single_link);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
}
