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

    public function matrixData($quizId){
        $startDate = date('Y-m-d',strtotime("-30 days"));
        $endDate   = date('Y-m-d',strtotime("now"));
        $oldDate = date('Y-m-d', strtotime('-1 month', strtotime($startDate)));
    
        $newstartsDataT = DB::select('SELECT date(created_at) as created_at, count(*) as status FROM tbl_matrix where quiz_id='.$quizId .' AND status = 1 AND date(created_at) >= "'.$startDate.'" and date(created_at) <= "'.$endDate.'" Group by date(created_at) order by date(created_at)');
        $oldstartsDataT = DB::select('SELECT date(created_at) as created_at, count(*) as status FROM tbl_matrix where quiz_id='.$quizId .' AND status = 1 AND date(created_at) >= "'.$oldDate.'" and date(created_at) <= "'.$startDate.'" Group by date(created_at) order by date(created_at)');
        
        $new_chart_data = '';
        $new_totalStarts = array();
        $new_tStarts = 5;
        foreach($newstartsDataT as $key => $value)
        {
            $str = '';
            $date1 =  date('Y-n-j',strtotime($value->created_at));
            $array=explode("-",$date1); 
           
                 $startDate1 = date('Y-m-d',strtotime($value->created_at));
                 $startDate11 = date('Y-n-j',strtotime($startDate1." -1 Months"));
                 $prevDate = explode("-",$startDate11);
                 $array[1] = $prevDate[1];
                 $array[0] = $prevDate[0];
           
           
            $str = 'Date.UTC('.$array[0].','.$array[1].','.$array[2].')';
            $new_chart_data .= "[".$str.",".$value->status."], ";
            array_push($new_totalStarts,$value->status);
            $new_tStarts = max($new_totalStarts);
        }
        $new_chart_data = rtrim($new_chart_data,' ,');

        $old_chart_data = '';
        $old_totalStarts = array();
        $old_tStarts = 5;
        foreach($oldstartsDataT as $key1 => $value1)
        {
            $strOld = ''; 
            $endDate1 = date('Y-n-j',strtotime($value1->created_at));
            $array_old=explode("-",$endDate1); 
            $str = 'Date.UTC('.$array_old[0].','.$array_old[1].','.$array_old[2].')';
            $old_chart_data .= "[".$str.",".$value1->status."], ";
            array_push($old_totalStarts,$value1->status);
            $old_tStarts = max($old_totalStarts);
        }
        $old_chart_data = rtrim($old_chart_data,' ,');
        
        $seriesData = '';
        $seriesData.='[{ name:"Current Period", data: ['.$new_chart_data.'] }, { name:"Previous Period", data: ['.$old_chart_data.'] }]';        
       
         //response Data
         $newresponseData = DB::select('SELECT date(created_at) as created_at, count(*) as count FROM tbl_matrix where quiz_id='.$quizId .' AND status = 2 AND date(created_at) >= "'.$startDate.'" and date(created_at) <= "'.$endDate.'" Group by date(created_at)  order By created_at ASC');

         $oldresponseData = DB::select('SELECT date(created_at) as created_at, count(*) as count FROM tbl_matrix where quiz_id='.$quizId .' AND status = 2 AND date(created_at) >= "'.$oldDate.'" and date(created_at) <= "'.$startDate.'" Group by date(created_at) order By created_at ASC');
        //echo 'SELECT date(created_at) as created_at, count(*) as count FROM tbl_matrix where quiz_id='.$quizId .' AND status = 2 AND date(created_at) >= "'.$oldDateS.'" and date(created_at) <= "'.$oldDateE.'" Group by date(created_at) order By created_at ASC';die;
         //echo "<PRE>";print_r($oldresponseData);die;
         $new_chart_dataR = '';
         $totalResponses = array();
         $tResponses = 5;
         foreach($newresponseData as $key => $value){
             $str = ''; 
            $date1 =  date('Y-n-j',strtotime($value->created_at));
            $array=explode("-",$date1); 

                  $startDate1 = date('Y-m-d',strtotime($value->created_at));
                  $startDate11 = date('Y-n-j',strtotime($startDate1." -1 Months"));
                  $prevDate = explode("-",$startDate11);
                  $array[1] = $prevDate[1];
                  $array[0] = $prevDate[0];
            
             $str = 'Date.UTC('.$array[0].','.$array[1].','.$array[2].')';
             $new_chart_dataR .= "[".$str.",".$value->count."], ";
             array_push($totalResponses,$value->count);
             $tResponses = max($totalResponses);
         }
         $new_chart_dataR = rtrim($new_chart_dataR,' ,');
 
         $old_chart_dataR = '';
         $totalResponsesold = array();
         $tResponsesold = 5;
         foreach($oldresponseData as $key1 => $value1){
             $strOld = ''; 
             $endDate1 = date('Y-n-j',strtotime($value1->created_at));
             $array_old=explode("-",$endDate1); 
             $str = 'Date.UTC('.$array_old[0].','.$array_old[1].','.$array_old[2].')';
             $old_chart_dataR .= "[".$str.",".$value1->count."], ";
             array_push($totalResponsesold,$value1->count);
             $tResponsesold = max($totalResponsesold);
         }
         $old_chart_dataR = rtrim($old_chart_dataR,' ,');
 
         $seriesDataR = '';
         $seriesDataR.='[{ name:"Current Period", data: ['.$new_chart_dataR.'] }, { name:"Previous Period", data: ['.$old_chart_dataR.'] }]';
        $startsData = DB::select('select * from tbl_matrix where quiz_id='.$quizId .' AND status = 1 AND created_at >= "'.$startDate.'" and created_at <= "'.$endDate.'"');
        $finishData = DB::select('select * from tbl_matrix where quiz_id='.$quizId .' AND status = 2 AND created_at >= "'.$startDate.'" and created_at <= "'.$endDate.'"');
      
        $Start = 'NaN';
        if(!empty($startsData)){
            $Start = count($startsData)/1000;
        }
         $finish = 'NaN';
        if(!empty($finishData)){
             $finish = count($finishData)/1000;
        }
        
        //com Rate Data
        $new_chart_dataCR = '';  
        $totalComRate = array();
        $tComRate = 5; 
        if(!empty($newresponseData)){
            for($i=0;$i<count($newresponseData);$i++){
                $comRate1 = '0';
                $crStart = DB::select('SELECT date(created_at) as created_at, count(*) as count FROM tbl_matrix where quiz_id='.$quizId .' AND status = 1 AND date(created_at) = "'.$newresponseData[$i]->created_at.'" Group by date(created_at)');

                if(!empty($crStart)){
                     $comRate1 = (($newresponseData[$i]->count*100)/$crStart[0]->count);
                    $date1 =  date('Y-n-j',strtotime($newresponseData[$i]->created_at));
                    $array=explode("-",$date1); 
                     $startDate1 = date('Y-m-d',strtotime($newresponseData[$i]->created_at));
                     $startDate11 = date('Y-n-j',strtotime($startDate1." -1 Months"));
                     $prevDate = explode("-",$startDate11);
                     $array[1] = $prevDate[1];
                     $array[0] = $prevDate[0];
               
                    $str = 'Date.UTC('.$array[0].','.$array[1].','.$array[2].')';
                    $new_chart_dataCR .= "[".$str.",".round($comRate1,'2')."], ";
                    array_push($totalComRate, $comRate1);
                    $tComRate = max($totalComRate);
                }
            }
        }

        $old_chart_dataCR = '';
        $totalComRateold = array();
        $tComRateold = 5; 
        if(!empty($oldresponseData)){
            for($i=0;$i<count($oldresponseData);$i++){
                $comRateold1 = '0';
                $crStartOld = DB::select('SELECT date(created_at) as created_at, count(*) as count FROM tbl_matrix where quiz_id='.$quizId .' AND status = 1 AND date(created_at) = "'.$oldresponseData[$i]->created_at.'" Group by date(created_at)');
                if(!empty($crStartOld)){
                    $comRateold1 = (($oldresponseData[$i]->count*100)/$crStartOld[0]->count);
                    $endDateold1 = date('Y-n-j',strtotime($oldresponseData[$i]->created_at));
                    $arrayold=explode("-",$endDateold1); 
                    $str = 'Date.UTC('.$arrayold[0].','.$arrayold[1].','.$arrayold[2].')';
                    $old_chart_dataCR .= "[".$str.",".round($comRateold1,'2')."], ";
                    array_push($totalComRateold, $comRateold1);
                    $tComRateold = max($totalComRateold);
                }
            }
        }
         $new_chart_dataCR = rtrim($new_chart_dataCR,' ,');
          $old_chart_dataCR = rtrim($old_chart_dataCR,' ,');
          $seriesDataCR = '';
        $seriesDataCR.='[{ name:"Current Period", data: ['.$new_chart_dataCR.'] }, { name:"Previous Period", data: ['.$old_chart_dataCR.'] }]';
        
         //all Data
        $startsDataCR = DB::select('select * from tbl_matrix where quiz_id='.$quizId .' AND status = 1 AND date(created_at) >= "'.$startDate.'" and date(created_at) <= "'.$endDate.'"');
        $finishDataCR = DB::select('select * from tbl_matrix where quiz_id='.$quizId .' AND status = 2 AND date(created_at) >= "'.$startDate.'" and date(created_at) <= "'.$endDate.'"');
        
        $comRate = '0';
        if(!empty($finishDataCR)){
            $comRate = ((count($finishDataCR)*100)/count($startsDataCR));
        }
        //echo round($comRate,'2');die;
        $data = array();
         $data['totalStarts'] = max($tResponses,$tResponsesold);
         $data['totalresponses'] = max($new_tStarts,$old_tStarts);
         $data['totalCR'] = max($tComRate,$tComRateold);
         $data['seriesData'] = $seriesData;
         $data['seriesDataR'] = $seriesDataR;
         $data['seriesDataCR'] = $seriesDataCR;
         $data['startDate'] = $startDate;
         $data['endDate'] = $endDate;
         $data['startsData'] = count($startsData);
         $data['finishData'] = count($finishData);
         $data['comRate'] = round($comRate,'2');
         echo json_encode($data);die;
        //return view('matrix',['quizData'=>$quizData,'quizId'=>$quizId,'startsData'=>$startsData,'finishData'=>$finishData,'cartData'=>$cartData,'new_chart_data'=>$new_chart_data,'old_chart_data'=>$old_chart_data,'startDate'=>$startDate,'endDate'=>$endDate,'responseData'=>$responseData]);
    }
}
