<?php

namespace App\Http\Controllers;
//use App\Helpers\helper;
use Illuminate\Http\Request;
use App\selectedchoice;
use App\Http\Resources\selectedchoice as selectedchoiceResources;
use DB;
use File;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choiceArr = DB::select('select * from tbl_choice');
        return json_encode($choiceArr);die;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->input());die;
        

        if($request->input('sort') == ''){
            $sort = 1;
        }else{
            $sort = $request->input('sort')+1;
        }
      //  echo $sort;die;
        $selChoice = new selectedchoice;
            $selChoice->quiz_id = $request->input('quiz_id');
            $selChoice->choice_id = $request->input('choice_id');
            $selChoice->question_value = $request->input('options');
            $selChoice->sort = $sort;
            if($selChoice->save()){
                $Fdata = new selectedchoiceResources($selChoice);
            } 
        
            $selData = DB::select('select * from selectedchoices where quiz_id = '.$request->input('quiz_id').' order by sort ASC');
           // print_r($selData);die;
            for($i=0;$i<count($selData);$i++){
                if($selData[$i]->sort < $sort && $Fdata->id != $selData[$i]->id){
                
                }else if($Fdata->id != $selData[$i]->id){
                    $sort = $sort+1;
                    DB::table('selectedchoices')->where('id', $selData[$i]->id)->update(array('sort' => $sort)); 
                    $sort++; 
                }
            }
           // print_r($Fdata);die;
       // $selchoiceArr = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id order by sort ASC');
        $data = array();
       

        $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$request->input('quiz_id').' order by sort ASC');
        $selchoiceArr = array();
        for($i=0;$i<count($selchoiceArr1);$i++){
            $selchoiceArr1[$i]->question_value = explode(",",$selchoiceArr1[$i]->question_value);
            $selchoiceArr1[$i]->question_value_1 = explode(",",$selchoiceArr1[$i]->question_value_1);
            array_push($selchoiceArr,$selchoiceArr1[$i]);
        }
        //echo "<PRE>";print_r($selchoiceArr);die;
        $data['selchoiceArr'] = $selchoiceArr;
        $data['insertId'] = $Fdata->id;
        return json_encode($data);die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id,$quizId)
    {
        DB::table('selectedchoices')->where('id', $id)->delete();

        $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$quizId.' order by sort ASC');
        $selchoiceArr = array();
        for($i=0;$i<count($selchoiceArr1);$i++){
            $selchoiceArr1[$i]->question_value = explode(",",$selchoiceArr1[$i]->question_value);
            $selchoiceArr1[$i]->question_value_1 = explode(",",$selchoiceArr1[$i]->question_value_1);
            array_push($selchoiceArr,$selchoiceArr1[$i]);
        }   
        //echo count($selchoiceArr);die;
       // echo "<PRE>";print_r($selchoiceArr);die;
        return json_encode($selchoiceArr);die;
    }

    public function selChoice(Request $request,$quizId)
    {
        $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$quizId.' order by sort ASC');
        $selchoiceArr = array();
        for($i=0;$i<count($selchoiceArr1);$i++){
            $selchoiceArr1[$i]->question_value = explode(",",$selchoiceArr1[$i]->question_value);
            $selchoiceArr1[$i]->question_value_1 = explode(",",$selchoiceArr1[$i]->question_value_1);
            array_push($selchoiceArr,$selchoiceArr1[$i]);
        }

        $data = array();
        $basic = DB::select('select * from basic_infos where quiz_id = '.$quizId); 

        $quizData = array();
        $quizData = DB::select('select * from quiz where id = '.$quizId); 

        $collection = collectionList();
        //echo "<PRE>";print_r($basic);die;
        $data['basic'] = $basic;
        $data['selchoiceArr'] = $selchoiceArr;
        $data['quizData'] = $quizData;
        $data['collection'] = $collection;
        return json_encode($data);die;
    }

    public function insertQuestion(Request $request,$id,$quizId){
        $choiceData = DB::select('select * from selectedchoices where id = '.$id);
        $selectedchoice = new selectedchoice;
        $selectedchoice = selectedchoice::find($id);
        $basic = DB::select('select * from basic_infos where quiz_id = '.$quizId);
        if($request->input('type') == 'question'){
            $selectedchoice->question = $request->input('question');
        }
        else if($request->input('type') == 'answer'){ 
            $question_value = implode(',', $request->input('answer'));
            $selectedchoice->question_value = trim($question_value,',');
        }
        else if($request->input('type') == 'answer1'){    
            $img=$imgF="";
            $imgArr = array();
            $imgArr = explode(',',$choiceData[0]->question_value);
            for($i=0;$i<count($request->input('answer1'));$i++){
                if($request->input('answer1')[$i]){
                    if(!empty($imgArr[$i])){
                        if($i<count($imgArr)){
                            $img.=$imgArr[$i].',';
                        }else{
                            $imgF.=$img.'dummy.jpg';
                        }  
                    }else{
                        if($img == ''){
                            $imgF.='dummy.jpg';
                        }else{
                            $imgF.=$img.'dummy.jpg';
                        }
                        
                    }
                
                }
            }
            if($imgF == ''){
                $imgF = $img;
            }
            //echo $imgF;die;
            $question_value1 = implode(',', $request->input('answer1'));
            $selectedchoice->question_value_1 = trim($question_value1,',');
            $selectedchoice->question_value =  trim($imgF,',');
        }

        if($selectedchoice->save()){
            $data  = new selectedchoiceResources($selectedchoice);
        }

        $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$quizId.' order by sort ASC');
        $selchoiceArr = array();
        for($i=0;$i<count($selchoiceArr1);$i++){
            $selchoiceArr1[$i]->question_value = explode(",",$selchoiceArr1[$i]->question_value);
            $selchoiceArr1[$i]->question_value_1 = explode(",",$selchoiceArr1[$i]->question_value_1);
            array_push($selchoiceArr,$selchoiceArr1[$i]);
        }
        //echo "<PRE>";print_r($selchoiceArr);die;
        return json_encode($selchoiceArr);die;
    }

    public function articleImage(Request $request,$id,$quizId,$index1){ 
       // echo $index1;die;
        $imgArr = array();
        //$imgArr = explode(",",$request->data);
        
       
        $filenameWithExt = $request->image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extension = $request->image->getClientOriginalExtension();
        $fileNameToStore = $filename.'.'.$extension;
      
        $request->image->move(base_path('public/images/'), $fileNameToStore);
        $image_path = url('/').'/public/images/'.$fileNameToStore;
        
        $selchoiceArr1 = DB::select('select * from selectedchoices where id = '.$id);
        $imgArr = array();
        $imgArr = explode(',',$selchoiceArr1[0]->question_value);

        if(!empty($imgArr)){
            for($p=0;$p<count($imgArr);$p++){
                if(!empty($imgArr[$p])){
                    if($index1 != ''){
                        $imgArr[$index1] = $fileNameToStore;
                    }
                }else{
                    $imgArr[] = $fileNameToStore;
                }
            }
        }else{
            $imgArr[0] = $fileNameToStore;
        }
        
        //echo "<PRE>";print_r($imgArr);die;
        $img=$imgF="";
            $titleArr = array();
            $titleArr = explode(',',$selchoiceArr1[0]->question_value_1);
           // print_r($selchoiceArr1[0]->question_value);die;
            for($i=0;$i<count($imgArr);$i++){
                if($imgArr[$i]){
                    if(!empty($titleArr[$i])){
                        if($i<count($titleArr)){
                            $img.=$titleArr[$i].',';
                        }else{
                            $imgF.=$img.'select';
                        }  
                    }else{
                        if($img == ''){
                            $imgF.='select';
                        }else{
                            $imgF.=$img.'select';
                        }   
                    }
                }
            }
            if($imgF == ''){
                $imgF = $img;
            }

       // echo $imgF.'gg';die;
       $finalImgStr = '';
       $finalImgStr =   implode(',',$imgArr);
        DB::table('selectedchoices')->where('id', $id)->update(array('question_value' => $finalImgStr,'question_value_1'=>$imgF));
   
        $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$quizId.' order by sort ASC');
        $selchoiceArr = array();
        for($i=0;$i<count($selchoiceArr1);$i++){
            $selchoiceArr1[$i]->question_value = explode(",",$selchoiceArr1[$i]->question_value);
            $selchoiceArr1[$i]->question_value_1 = explode(",",$selchoiceArr1[$i]->question_value_1);

            array_push($selchoiceArr,$selchoiceArr1[$i]);
        }
        //echo "<PRE>";print_r($selchoiceArr);die;
        return json_encode($selchoiceArr);die;
    }

    public function delselAns(Request $request,$id,$index,$quizId){
        //echo $id.'<br/>'.$index;
        //print_r($request->input('imgArr'));die;
        $dataImg = $request->input('imgArr');
        $dataTitle = $request->input('titleArr');
            unset($dataImg[$index]); // remove item at index 0
            unset($dataTitle[$index]);
            $dataI = array_values($dataImg); // 'reindex' array
            $dataT = array_values($dataTitle);
            //print_r($data1);die;
           $strI =  implode(",",$dataI);
           $strT =  implode(",",$dataT);
           DB::table('selectedchoices')->where('id', $id)->update(array('question_value' => $strI,'question_value_1'=>$strT));

           $selchoiceArr1 = DB::select('select tbl_choice.htmlcode,tbl_choice.options,selectedchoices.* from selectedchoices INNER JOIN tbl_choice ON selectedchoices.choice_id=tbl_choice.id where quiz_id = '.$quizId.' order by sort ASC');
           $selchoiceArr = array();
           for($i=0;$i<count($selchoiceArr1);$i++){
               $selchoiceArr1[$i]->question_value = explode(",",$selchoiceArr1[$i]->question_value);
               $selchoiceArr1[$i]->question_value_1 = explode(",",$selchoiceArr1[$i]->question_value_1);
               array_push($selchoiceArr,$selchoiceArr1[$i]);
           }
           //echo "<PRE>";print_r($selchoiceArr);die;
           return json_encode($selchoiceArr);die;
    }
}
