<template>
  <div>
    <main class="">
        <div id="app">
        <div class="app-wrapper">
                <div class="main-container">
                    <div class="topbar">
                        <div class="t-navbar">
                            <div class="breadcrumbs">
                                <a href="javascript:void(0);" @click="redirectDas('dashboard',quizId)" class="back-link"> Dashboard </a>
                                <span>/ <span class="current-title">{{ quizData[0]['quiz_name'] }}</span></span>
                            </div>
                            <div class="right-menu">
                                <a href="javascript:void(0);" class="btn btn-sm btn-themec btn-preview" @click="redirectDas('previewQuiz',quizId)"> <i class="fas fa-eye"></i> Preview Quiz</a>
                            </div>
                            <div class="topnav-wrap">
                                <ul class="navbar-wrap">
                                   <!-- <li class="nav-item">
                                        <a class="nav-link" href="#">Create</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" @click="redirectDas('publish',quizId)">Publish</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <section class="app-apart">
                        <div class="app-position">
                            <div class="app-builder">
                                <div class="ab-wrap">
                                    <div class="builder-container app-row row no-gutters">
                                        <div class="col-6 quiz-bilder" id="right-side-1">
                                          <!--  <div class="qb-header">
                                                <h5> <b>Quiz Builder</b> - <a class="qbh-link" href="javascript:void(0);">Learn how the quiz buider works</a></h5>
                                            </div> -->
                                            <div class="padd20">
                                            <div class="steps" @click="show1('s1','')">  <!--stepbox--> <!-- "step-active" class for active -->
                                                    <div class="steps-box step-shadow">
                                                        <div class="dropdown step-drop">
                                                            <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            +
                                                            </button>
                                                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">    
                                                                <div v-for="choice in choiceArr">
                                                                    <a class="dropdown-item" href="javascript:void(0);" @click="insertChoice(quizId,choice.id,choice.options)">{{ choice.title }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="framemsg">
                                                        </div>
                                                        <div class="step--title">
	                                                        <!--<h3>Primary Step</h3>-->
	                                                     </div>
                                                        <div class="step-no">
                                                            <div class="step-type">
                                                                <i class="far fa-image"></i> <!-- <span>2</span>-->
                                                            </div>
                                                        </div>
                                                        <div class="step-content">
                                                            <div class="steprow">
                                                                <div class="step-title">
                                                                     <textarea class="form-control sr-area" id="subtitle_1" placeholder="Start Quiz" @keyup="editBasic($event,quizId,'question_title')">{{ basicData[0]['quiz_title'] }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="steprow text-center">
                                                                 <button id="btn2" class="btn btn" :style="'font-size:'+basicData[0]['btn_font_size']+'px;background-color:'+basicData[0]['btn_bgcolor']+';color:'+basicData[0]['btn_txtcolor']+';border-radius:'+basicData[0]['btn_border_radius']+'px;'">{{ basicData[0]["btn_text"] }}</button>
                                                             </div>
                                                            <div align="right">
                                                            <button class="btn btn-settings" type="button" name="" @click="changeSettings('1')"><i class="fas fa-cogs"></i></button>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div style="display:none;"></div>
                                            <div v-for="(sChoice,index) in selChoice" v-bind:key="sChoice.id" :id="sChoice.id">
                                                <div class="steps" @click="show1('s2',sChoice.id)"><!--stepbox--> <!-- "step-active" class for active -->
                                                    <div class="steps-box step-shadow">
                                                        <div class="dropdown step-drop">
                                                            <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            +
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">    
                                                                <div v-for="choice in choiceArr">
                                                                    <a class="dropdown-item" href="javascript:void(0);" @click="insertChoice(quizId,choice.id,choice.options,sChoice.sort)">{{ choice.title }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="framemsg">
                                                        </div>
                                                        <div class="step--title">
	                                                        <!-- <h3>Primary Step</h3> -->
	                                                     </div>
                                                        <div class="step-no">
                                                            <div class="step-type">
                                                                <i class="far fa-image"></i> <!-- <span>2</span>-->
                                                            </div>
                                                        </div>
                                                        <div class="step-content">  
                                                            <div class="steprow">   
                                                                <div class="step-title" v-if="sChoice.choice_id != 6">
                                                                     <textarea class="form-control sr-area" id="subtitle_1" placeholder="Type your question here" @keyup="change($event,sChoice.id,'question',index)">{{ sChoice.question }}</textarea>
                                                                </div>  
                                                                <div class="step-title" v-else> 
                                                                
                                                                     <textarea class="form-control sr-area" id="subtitle_2" placeholder="Type your statement here" @keyup="change($event,sChoice.id,'answer',index)">{{ sChoice['question_value'][0] }}</textarea>
                                                                </div>
                                                                <div class="step-choice w-100 mb-30">
                                                                    <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                        <div class="sc-row">
                                                                            <hr>
                                                                                <div class="sc-choice frameSort"> 
                                                                                    <div v-if="sChoice['question_value'] == '' && sChoice.choice_id != 7 && sChoice.choice_id != 8 && sChoice.choice_id != 1 && sChoice.choice_id != 9 && sChoice.choice_id != 10 && sChoice.choice_id != 11 && sChoice.choice_id != 12 && sChoice.choice_id != 6 && sChoice.choice_id != 14" >
                                                                                         <input v-if="sChoice.choice_id  != 5" type="text" @keyup="change($event,sChoice.id,'answer',index,0)">&nbsp;&nbsp;<br> 
                                                                                         <input v-if="sChoice.choice_id  == 5" type="text" @keyup="change($event,sChoice.id,'answer1',index,0)">&nbsp;&nbsp;<br> 
                                                                                         
                                                                                         <input v-if="sChoice.choice_id == 5" type="file" value="upload" @change="onFileChange($event,sChoice.id,'answer',index)">      
                                                                                    </div>  
                                                                                    <div v-else v-if="sChoice.choice_id  != 6" > 
                                                                                        <div  v-for="(abc,index1) in sChoice['question_value']" v-bind:key="index1" v-if="sChoice['question_value'][index1] != ''">
                                                                                            <input type="text" name="answer" v-if="sChoice.choice_id  != 5" :value="sChoice['question_value'][index1]" @keyup="change($event,sChoice.id,'answer',index,index1)">
                                                                                            <input type="text" name="answer1" v-if="sChoice.choice_id  == 5" :value="sChoice['question_value_1'][index1]"  @keyup="change($event,sChoice.id,'answer1',index,index1)">
                                                                                            <span id="add" v-if="sChoice.choice_id != 4 && sChoice.choice_id != 13" class="choicestep" @click="addQuestions(index)"><i class="fas fa-plus"></i></span>&nbsp;&nbsp;<br><span id="remove" v-if="sChoice.choice_id != 4 && sChoice.choice_id != 13" @click="removeQuestions(sChoice['id'],index1,index)" class="choicestep"><i class="fas fa-minus"></i></span>
                                                                                            <input v-if="sChoice.choice_id == 5" type="file" value="upload" @change="onFileChange($event,sChoice.id,'answer',index,index1)">      
                                                                                       </div>
                                                                                    </div>
                                                                                </div>
                                                                             <br/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-themec" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="deleteQuestion(sChoice.id)">
                                                            -
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="steps" @click="show1('s3','')">  <!--stepbox--> <!-- "step-active" class for active -->
                                                    <div class="steps-box step-shadow">
                                                        <div class="dropdown step-drop">
                                                            <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            +
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <div v-for="choice in choiceArr" :key="'m'+choice.id">
                                                                    <a class="dropdown-item" href="javascript:void(0);" @click="insertChoice(quizId,choice.id,choice.options)">{{ choice.title }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="framemsg">
                                                        </div>
                                                        <div class="step--title">
	                                                        <!-- <h3>Primary Step</h3> --></h3>
	                                                     </div>
                                                        <div class="step-no">
                                                            <div class="step-type">
                                                                <i class="far fa-image"></i> <!-- <span>2</span>-->
                                                            </div>
                                                        </div>
                                                        <div class="step-content">
                                                            <div class="steprow">
                                                                <div class="step-title">
                                                                     <textarea class="form-control sr-area" id="subtitle_1" placeholder="Type your Thank you message here" @keyup="editBasic($event,quizId,'quiz_thankyou')">{{ basicData[0]['quiz_thankyou'] }}</textarea>
                                                                </div>       
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-6 quiz-bilder" id="right-side-2" style="display: none;">  
                                        <div class="quizb-content padd20">
                                          <div class="quizb-field">
                                            <div class="quizb-field-con">
                                                <div class="input-w-select">
                                                  <div class="iws-title">Start Button text</div>
                                                  <div class="iws-input">
                                                      <input  type="text" class="form-control" placeholder="Write text here" :value="basicData[0]['btn_text']" id="next_btntext" name="next_btntext" @keyup="editBasicInfo($event,basicData[0],'btn_text')">
                                                  </div>
                                                </div>
                                                 <hr class="dot">
                                                  <div class="input-w-select">
                                                  <div class="iws-title">Continue Button text</div>
                                                  <div class="iws-input">
                                                      <input  type="text" class="form-control" placeholder="Write text here" :value="basicData[0]['continue_btntext']" id="previous_btntext" name="previous_btntext" @keyup="editBasicInfo($event,basicData[0],'continue_btntext')">
                                                  </div>
                                                </div>
                                                <hr class="dot">
                                                <div class="input-w-select">
                                                    <div class="iws-title">Button Background Color</div>
                                                    <div class="iws-input">
                                                        <input  class="form-control" type="color" id="next_btnbgcolor" :value="basicData[0]['btn_bgcolor']" name="next_btnbgcolor" @change="editBasicInfo($event,basicData[0],'btn_bgcolor')"/>
                                                    </div>
                                                </div>
                                                 <hr class="dot">
                                                 <div class="input-w-select">
                                                    <div class="iws-title">Button Text Color</div>
                                                    <div class="iws-input">    
                                                     <input class="form-control" type="color" id="next_btn_text_color" :value="basicData[0]['btn_txtcolor']" name="next_btn_text_color" @change="editBasicInfo($event,basicData[0],'btn_txtcolor')"/>
                                                    </div>
                                                </div>
                                                 <hr class="dot">
                                                <div class="input-w-select">
                                                    <div class="iws-title">Font Size</div>
                                                    <div class="iws-input">
                                                        <input class="form-control" type="number" autocomplete="off" placeholder="" :value="basicData[0]['btn_font_size']" id="next_fsize" name="next_fsize" @change="editBasicInfo($event,basicData[0],'btn_font_size')">
                                                        <div class="iws-endperson">%</div>
                                                    </div>
                                                </div>
                                                 <hr class="dot">
                                                <div class="input-w-select">
                                                    <div class="iws-title">Border radius</div>
                                                    <div class="iws-input">
                                                        <input class="form-control" type="number" autocomplete="off" :value="basicData[0]['btn_border_radius']" id="next_bradius" name="next_bradius" @change="editBasicInfo($event,basicData[0],'btn_border_radius')">
                                                        <div class="iws-endperson">%</div>
                                                    </div>
                                                </div>
                                                <hr class="dot">
                                                 <button class="btn btn-bgcolor" @click="changeSettings('2')">Save</button>
                                                </div>
                                              </div>
                                            </div>             
                                      </div>
                                        <div class="col-6 quiz-preview">
                                                <div class="qp-full framep" id="s1">
                                                    <div id="qp-quiz" class="qp-quiz">
                                                        <section id="s11" class="qp-slide qp-cover">
                                                            <div class="quiz-box">
                                                                <div class="quiz-wrapp">
                                                                    <h1 id="">{{ basicData[0]['quiz_title'] }}</h1>
                                                                    <div class="steprow text-center" > 
                                                                        <button id="btn1" class="btn btn-info" :style="'font-size:'+basicData[0]['btn_font_size']+'px;background-color:'+basicData[0]['btn_bgcolor']+';color:'+basicData[0]['btn_txtcolor']+';border-radius:'+basicData[0]['btn_border_radius']+'px;'">{{ basicData[0]['btn_text'] }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div v-for="schoice in selChoice" >
                                                    <div class="qp-full framep" :id="'prev'+schoice.id" style="display:none;">
                                                        <div id="qp-quiz" class="qp-quiz">
                                                            <section class="qp-slide qp-cover" >
                                                                <div class="quiz-box">
                                                                    <div class="quiz-wrapp">
                                                                        <h1 :id="'question_'+schoice.id">{{ schoice.question }}</h1>
                                                                            <div class="steprow text-center" v-if="schoice">
                                                                            <!--<div v-html="schoice.htmlcode"></div>-->
                                                                           
                                                                                <div v-if="schoice.choice_id == 2">
                                                                                    <select>
                                                                                        <option>Select</option>
                                                                                        <option v-if="schoice['question_value'].length != 0" v-for="(choicesValue,index) in schoice['question_value']">{{ schoice['question_value'][index] }}</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 3">
                                                                                    <div v-if="schoice['question_value'].length == 0">
                                                                                        <input type="radio" name="choice" >
                                                                                    </div>
                                                                                    <div v-else v-for="(choice,index) in schoice['question_value']">
                                                                                    <input type="radio" name="choice"  :value="schoice['question_value'][index]"> {{ schoice['question_value'][index] }}
                                                                                    </div>    
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 4">
                                                                                    <div v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                        <input type="radio" name="radiotype"  :value="schoice['question_value'][index]"> {{ schoice['question_value'][index] }}
                                                                                    </div>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 5">
                                                                                {{ schoice['question_value'][0] }}
                                                                                    <div v-if="schoice['question_value'].length == 0" v-for="(choice,index) in schoice['question_value']">
                                                                                        <ul style="list-style:none;"><li><div class="quizcolor-box" ><div class="quizcolor-thumb" style="'background-image: url('stepimg.jpg')'"></div><div class="quizcolor-inner"><div class="custom-control custom-checkbox mr-sm-2">
                                                                                        <input class="custom-control-input" type="radio" name="radio" ><label class="custom-control-label"></label></div></div></div></li></ul>
                                                                                    </div>
                                                                                    <div v-else v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                        <ul style="list-style:none;"><li><div class="quizcolor-box" ><div class="quizcolor-thumb" :style="'background-image: url(images/'+schoice['question_value'][index]+')'"></div><div class="quizcolor-inner"><div class="custom-control custom-checkbox mr-sm-2">
                                                                                        <input class="custom-control-input" type="radio" name="radio" ><label class="custom-control-label" @keyup="alert('bvbcvc');">{{ schoice['question_value_1'][index] }}</label></div></div></div></li></ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 6">
                                                                                    <h1 v-if="schoice['question_value'].length != 0">{{ schoice['question_value'][0] }}</h1>
                                                                                    <button id="btn" class="btn btn-info">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 7">
                                                                                    <div v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                     <input type="text" placeholder="Type your answer here" class="lq-input" :value="schoice['question_value'][index]"><br/>
                                                                                     </div>
                                                                                     <input type="text" placeholder="Type your answer here" class="lq-input"  value="" v-else>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 8">
                                                                                <div v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                    <textarea id="focus" placeholder="Type your answer here" name="longtext" rows="4" cols="35">{{ schoice['question_value'][index] }}</textarea>
                                                                                </div>
                                                                                    <textarea id="focus" placeholder="Type your answer here" name="longtext" rows="4" cols="35" v-else></textarea>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 9">
                                                                                    <input placeholder="MM" name="MM" type="text" maxlength="2" style="max-width: 45px;"> / <input placeholder="DD" name="DD" type="text" maxlength="2" style="max-width: 45px;"> / <input placeholder="YYYY" name="YYYY" type="text" maxlength="4" style="max-width: 60px;"> 
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 10">
                                                                                    <input type="text" placeholder="Type your name here" class="lq-input">
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 11">
                                                                                    <input type="email" placeholder="Your Email" class="lq-input">
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 12">
                                                                                    <input type="tel" placeholder="Your Phone" class="lq-input">
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 13">
                                                                                    <div v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                        <input type="radio" name="radio1"  :value="schoice['question_value'][index]"> {{ schoice['question_value'][index] }}
                                                                                    </div>
                                                                                </div>
                                                                                  <div v-if="schoice.choice_id ==14">
                                                                                    <select>
                                                                                        <option>Select</option>
                                                                                        <option v-if="collection != 0" v-for="(collection1,index) in collection">{{ collection1.title }}</option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="qp-full framep" id="s3" style="display:none;">
                                                    <div id="qp-quiz" class="qp-quiz">
                                                        <section class="qp-slide qp-cover">
                                                            <div class="quiz-box">
                                                                <div class="quiz-wrapp">
                                                                    <h1>{{ basicData[0]['quiz_thankyou'] }}</h1>   
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>     
                
    </main>
</div>
</template>

<script>
    export default {
        data(){
            return{
                quizId : '',
                choiceArr : [],
                quizData : [],
                selectedChoice : {
                    quiz_id :'',
                    choice_id :'',
                    options : '',
                    sort: ''
                },
                selChoice: [],
                questionData : {
                    question : '',
                    answer: '',
                    answer1 : '',
                    type : ''
                },
                basicInfo : {
                     question_title : '',
                     question_thankyou : ''
                },
                addQuestion : {
                    index : ''
                },
                indexArr : [],
                deleteData : {
                    imgArr : [],
                    titleArr : []
                },
                basicData : [],
                collection : []
            }
        },
        created(){
            this.fetchChoice();
            this.selectedChoice1();
        },
        methods:{
            fetchChoice(){
                var quizId = this.$session.get('quizId');
                this.quizId = quizId;
                var url = 'api/Choice';
                fetch(url)
                .then(res => res.json())
                .then(res => { 
                    if(res.length != 0){
                        for(var i=0;i<res.length;i++){
                            this.choiceArr.push(res[i]);
                        } 
                    }
                    //this.choiceArr = res;
                    //console.log(this.choiceArr);
                });
            },
            selectedChoice1(){
                var quizId = this.$session.get('quizId');
                this.quizId = quizId;
                var url = 'api/selChoice/'+quizId;
                fetch(url)
                .then(res => res.json())
                .then(res => { 
               // alert(res);
                    this.selChoice = [];
                    if(res.selchoiceArr.length != 0){
                        for(var i=0;i<res.selchoiceArr.length;i++){
                            this.selChoice.push(res.selchoiceArr[i]);
                        } 
                    }

                    this.basicData = [];
                    if(res.basic.length != 0){
                        for(var i=0;i<res.basic.length;i++){
                            this.basicData.push(res.basic[i]);
                        } 
                    }

                    
                    if(res.quizData.length != 0){
                        for(var i=0;i<res.quizData.length;i++){
                            this.quizData.push(res.quizData[i]);
                        } 
                    }  
                    //console.log(this.quizData[0]['quiz_name']);

                    for(var i=0;i<res.collection.response.length;i++){
                            this.collection.push(res.collection.response[i]);
                    } 
                    //alert(this.collection);
                    //console.log(this.choiceArr);
                });
            },
            editBasicInfo(e,oldData,type){
                //alert(e.target.value);
                var field = ''+type+'';
               // $('#'+type).text(e.target.value);
                this.basicData[0][field] = e.target.value;
                console.log(this.basicData);
                 var url = 'api/edit/'+this.basicData[0]['id'];
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(this.basicData[0]),
                    headers:{
                        'content-type':'application/json'
                    }
                    })
                    .then(res => res.json())
                    .then(res => {
                        this.basicData = [];
                        if(res.basic.length != 0){
                            for(var i=0;i<res.basic.length;i++){
                                this.basicData.push(res.basic[i]);
                            } 
                        }
                    }); 
            },
            onFileChange(e,id,type,index,index1) {
                const file = e.target.files[0];
                const config = {
                headers: { 'content-type': 'multipart/form-data' }
                }
               this.questionData.type = type;
               if(type == 'answer'){ 
                   this.selChoice[index]['question_value'][index1] = file;
                   this.questionData.answer = this.selChoice[index]['question_value'][index1];
               }
                let ImageData = new FormData();
                ImageData.append('image',file);
                ImageData.append('type',type);
                ImageData.append('data',this.questionData.answer);
                axios.post('api/articleImage/'+id+'/'+this.quizId+'/'+index1,ImageData,config)
                .then(res => {
                    this.selChoice = [];
                    console.log(res.data);
                        if(res.data.length != 0){
                            for(var j=0;j<res.data.length;j++){
                                this.selChoice.push(res.data[j]);
                            } 
                        }
                    console.log(this.selChoice);
                }); 
            },
            show1(id,FId){
                if(id == 's2'){
                    $('.framep').hide();
                    $('#prev'+FId).show();  
                }else if(id == 's1'){
                    $('.framep').hide();
                    $('#s1').show();  
                }else if(id == 's3'){
                    $('.framep').hide();
                    $('#s3').show();  
                }
            },
            insertChoice(quiz_id,choice_id,options,sort){ 
                if(sort == undefined && sort == ''){
                    sort = '';
                }
                this.selectedChoice.quiz_id = quiz_id;
                this.selectedChoice.choice_id = choice_id;
                this.selectedChoice.options = options;
                this.selectedChoice.sort = sort;
                var url = 'api/insertselChoice';
                    fetch(url,{
                        method:'POST',
                        body:JSON.stringify(this.selectedChoice),
                        headers:{
                            'content-type':'application/json'
                        }
                        })
                        .then(res => res.json())
                        .then(res => {
                            this.selChoice = [];
                        
                            if(res.selchoiceArr.length != 0){
                                for(var i=0;i<res.selchoiceArr.length;i++){
                                    this.selChoice.push(res.selchoiceArr[i]);
                                } 
                            } 
                            setTimeout(function () { this.show1('s2',res.insertId) }.bind(this), 1000)    
                });
            },
            change(e,id,type,index,index1){
              //  alert(index);
               this.questionData.type = type;
               if(type == 'question'){
                   this.questionData.question = e.target.value;
               }else if(type == 'answer'){  
                   this.selChoice[index]['question_value'][index1] = e.target.value;
                   this.questionData.answer = this.selChoice[index]['question_value'];
               }else if(type == 'answer1'){
                   this.selChoice[index]['question_value_1'][index1] = e.target.value;
                   this.questionData.answer1 = this.selChoice[index]['question_value_1'];
               }
                
               
                var url = 'api/insertQuestion/'+id+'/'+this.quizId;;
                    fetch(url,{
                        method:'POST',
                        body:JSON.stringify(this.questionData),
                        headers:{
                            'content-type':'application/json'
                        }
                        })
                        .then(res => res.json())
                        .then(res => {
                              this.selChoice = [];
                                if(res.length != 0){
                                    for(var i=0;i<res.length;i++){
                                        this.selChoice.push(res[i]);
                                    } 
                                }
                        });

            },
            addQuestions(id){
               // alert(id);
                //this.choiceArr1[id].push(Vue.util.extend({}, this.addQuestion));
               // console.log(this.selChoice[id]['question_value']);
                this.selChoice[id]['question_value'].push(Vue.util.extend({}, '0 : ""'));
                console.log(this.selChoice[id]['question_value']);

            },
            deleteQuestion(id){
                var url = 'api/delselChoice/'+id+'/'+this.quizId;
                fetch(url,{
                    method:'POST',
                    headers:{
                        'content-type':'application/json'
                    }
                })
                .then(res => res.json())
                .then(res => {
                    this.selChoice = [];
                    if(res.length != 0){
                        for(var i=0;i<res.length;i++){
                            this.selChoice.push(res[i]);
                        } 
                    }
                });
            
            },
            removeQuestions(id,Arrindex,index){
                this.deleteData.imgArr = this.selChoice[index]['question_value'];
                this.deleteData.titleArr = this.selChoice[index]['question_value_1'];
                //console.log(this.deleteData.imgArr);
                var url = 'api/delselAns/'+id+'/'+Arrindex+'/'+this.quizId;
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(this.deleteData),
                    headers:{
                        'content-type':'application/json'
                    }
                })
                .then(res => res.json())
                .then(res => {
                    this.selChoice = [];
                    if(res.length != 0){
                        for(var i=0;i<res.length;i++){
                            this.selChoice.push(res[i]);
                        } 
                    }
                });
            },
            redirectDas(type,quizId){
                if(type == 'dashboard'){
                    window.location.href="/Quiz_App";
                }else if(type == 'publish'){
                    window.location.href="publish";
                }else if(type == 'previewQuiz'){
                    window.location.href="previewQuiz";
                }
                window.open(url, '_blank');
                
            },
            editBasic(e,quiz_id,type){
                var url = 'api/editBasic/'+quiz_id;
                if(type == 'question_title'){
                    this.basicInfo.question_title =e.target.value;
                }if(type == 'quiz_thankyou'){
                    this.basicInfo.question_thankyou =e.target.value ;
                }
                console.log(this.basicInfo);
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(this.basicInfo),
                    headers:{
                        'content-type':'application/json'
                    }
                })
                .then(res => res.json())
                .then(res => {
                    this.basicData = [];
                    if(res.length != 0){
                        for(var i=0;i<res.length;i++){
                            this.basicData.push(res[i]);
                        } 
                    }
                });
            },
            changeSettings(type){
                if(type == 1){
                    $('#right-side-1').hide();
                    $('#right-side-2').show();
                    show1('s1');
                }
                else if(type == 2){
                    $('#right-side-2').hide();
                    $('#right-side-1').show();
                    show1('s1');
                }
            }
            
        }
    }
</script>
