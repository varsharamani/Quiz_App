<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
use App\basicInfo;
use App\selectedchoice;
use App\Http\Resources\selectedchoice as selectedchoiceResources;
use DB;
use App\Http\Resources\basicInfo as BasicInfoResources;
use Session;

class QuizController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
        $this->username='a7acdbe5d4d00f7537f7292aa226df09';
        $this->password = '69e8f92992dbb9056c994d882066aa6d';
        ini_set('display_errors',1);
        error_reporting(E_ALL);       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request,$quizId)
    { 
        //$quizId = base64_decode($quizId1);
       // echo $quizId1;die;
        $selFrame = array();
        $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$quizId.' order by sort ASC');
        $selchoiceArr = array();
        for($i=0;$i<count($selchoiceArr1);$i++){
            $selchoiceArr1[$i]->question_value = explode(",",$selchoiceArr1[$i]->question_value);
            $selchoiceArr1[$i]->question_value_1 = explode(",",$selchoiceArr1[$i]->question_value_1);
            array_push($selchoiceArr,$selchoiceArr1[$i]);
        }
        //echo "<PRE>";print_r($selchoiceArr);die;
        //return json_encode($selchoiceArr);die;
         $basic_infos = DB::select('select * from basic_infos where quiz_id = '.$quizId);
         $collection = collectionList();

        $data['frames'] = $selchoiceArr;
        $data['basic_infos'] = $basic_infos;
        $data['collection'] = $collection;

        return json_encode($data);
    }

    public function getSelChoice(Request $request,$quizId,$sort,$id){
       // print_r($request->input('choiceid'));die;
        if($sort != 0){
            $selectedchoice = new selectedchoice;
            $selectedchoice = selectedchoice::find($id);
            if($request->input('choiceid') == 5){
                $answer = implode(',', $request->input('answer'));
                $selectedchoice->question_answer = $answer;
            }else{
                $selectedchoice->question_answer = $request->input('answer');
            } 
            if($selectedchoice->save()){
                $data  = new selectedchoiceResources($selectedchoice);
            }
        }
       
        $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$quizId.' and sort > '.$sort.' order by sort ASC');
        //print_r($selchoiceArr1);die;
        if(!empty($selchoiceArr1)){
            echo $selchoiceArr1[0]->sort;die;
        }else{
            echo json_encode("hii");die;
        }
       
    }

}
?>