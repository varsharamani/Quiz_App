<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\basicInfo;
use DB;
use App\Http\Resources\basicInfo as BasicInfoResources;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allQuiz = array();
        $allQuiz = DB::select('select * from quiz');
        return $allQuiz;
    }

    public function update(Request $request, $id)
    {
      //  echo "<PRE>";print_r($request->input());die;
        $basicInfo = new basicInfo;
        $basicInfo = basicInfo::find($id);
        $basicInfo->quiz_title = $request->input('quiz_title');
        $basicInfo->quiz_thankyou = $request->input('quiz_thankyou');
        $basicInfo->bgcolor = $request->input('bgcolor');
        $basicInfo->btn_bgcolor = $request->input('btn_bgcolor');
        $basicInfo->btn_txtcolor = $request->input('btn_txtcolor');
        $basicInfo->link_popup_width = $request->input('link_popup_width');
        $basicInfo->link_popup_height = $request->input('link_popup_height');
        $basicInfo->btn_popup_width = $request->input('btn_popup_width');
        $basicInfo->btn_popup_height = $request->input('btn_popup_height');
        $basicInfo->btn_text = $request->input('btn_text');
        $basicInfo->btn_font_size = $request->input('btn_font_size');
        $basicInfo->btn_border_radius = $request->input('btn_border_radius');
        $basicInfo->continue_btntext = $request->input('continue_btntext');

        if($basicInfo->save()){
            $data =  new BasicInfoResources($basicInfo);
        }

        $basic = DB::select('select * from basic_infos where quiz_id = '.$request->input('quiz_id')); 
        $data['basic'] = $basic;
        return json_encode($data);die;
    }

    public function addQuiz(Request $request){
        $id = DB::table('quiz')->insertGetId( ['quiz_name'=>$request->input('quiz_name')]);
           DB::table('basic_infos')->insertGetId( ['quiz_id'=>$id,'quiz_thankyou'=>'Thank You','bgcolor'=>'#aaffff','btn_bgcolor'=>"#008a8a",'btn_txtcolor'=>"#ffffff",'btn_text'=>'TAKE OUR QUIZ','btn_font_size'=>"21",'btn_border_radius'=>"8",'continue_btntext'=>'Continue']);
          echo json_encode($id);die;
    }

    public function editQuiz($quiz_id){
          Session::put('quizId', $quiz_id);
          return $quiz_id;
    }

    public function destroy($id)
    {
        $allFrame = DB::delete('delete from selectedchoices where quiz_id = '.$id);
         DB::delete('delete from quiz where id = '.$id);
         DB::delete('delete from basic_infos where quiz_id = '.$id);
         return $id;
    }

    public function editBasic(Request $request,$quizId){
       if(!empty($request->input('question_title'))){
            DB::table('basic_infos')->where('quiz_id', $quizId)->update(array('quiz_title' => $request->input('question_title'))); 
       }else if(!empty($request->input('question_thankyou'))){
            DB::table('basic_infos')->where('quiz_id', $quizId)->update(array('quiz_thankyou' => $request->input('question_thankyou'))); 
       }

       $data = DB::select('select * from basic_infos where quiz_id = '.$quizId); 
       return json_encode($data);
    }

}
