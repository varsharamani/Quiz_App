<template>
    <div>
        <div class="container" v-if="popShow">
       
			<div class="quiz-container" :style="'background-color:'+basicInfo[0].bgcolor">
				 <button type="button" class="close" aria-label="Close" id="close-mod" @click="closeModal()" style="margin-right: 40px;margin-top: 40px;font-size: 50px;">
                  <span aria-hidden="true">&times;</span>
                </button>
				<div class="qc-table">
					<div class="qc-tcell">
						<div class="centered qc-first">
                             <div class="qb-header">    
    							<h4>{{ basicInfo[0].quiz_title }}</h4>
    							<!--<p>{{ basicInfo[0].title_2 }}</p>-->
                            </div>
							<div class="qc-button">
								<input type="button" :value="basicInfo[0].btn_text" :style="'width:200px;height:40px;background-color:'+basicInfo[0].btn_bgcolor+';color:'+basicInfo[0].btn_txtcolor+';font-size:'+basicInfo[0].btn_font_size+'px; border-radius:'+basicInfo[0].btn_border_radius+'px;'"  id="start1" name="start1" @click="FrameSelection('Take Quiz','0')">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="container" v-if="quizShow">
                
            <div class="quiz-container" :style="'background-color:'+basicInfo[0].bgcolor">
                 <button type="button" class="close" aria-label="Close" id="close-mod"  @click="closeModal()" style="margin-right: 40px;margin-top: 40px;font-size: 50px;">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="qc-table">
					         <div class="qc-tcell">
                        <div class="quix-box">
                            <div class="qb-header">
                                <!--<h4>{{ basicInfo[0].subtitle_1 }}</h4>
                                <p>{{ basicInfo[0].subtitle_2 }}</p>-->
                            </div>
                            <div class="quiz-inner">
                                <div class="quiz-product">
                                    <div class="quiz-preview-container">
                                        <div class="preview0">
                                            
                                    
                                        <div v-if="selChoice.length != 0">
                                        
                                            <!--<div v-if="frames" class="quiz-pro-box" v-for="(frame,index) in frames">
                                                <div class="quiz-pro">
                                                    <div class="qpb-thumb" :style="'background-image: url('+frame.frame_img+')'"></div>
                                                    <div class="qpb-inner">
                                                        <div class="custom-control custom-checkbox mr-sm-2">
                                                            <input class="custom-control-input" type="checkbox" :value="frame.id" name="checkbox" :id="'f_'+index"  @change="colorSelection($event,frame.id)"><label class="custom-control-label" :for="'f_'+index" >{{ frame.frame }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div v-for="schoice in selChoice" >
                                                    <div class="qp-full framep" :id="'prev'+schoice.id">
                                                        <div id="qp-quiz" class="qp-quiz">
                                                            <section class="qp-slide qp-cover" >
                                                                <div class="quiz-box">
                                                                    <div class="quiz-wrapp">
                                                                        <!--<h1 :id="'question_'+schoice.id">{{ schoice.question }}</h1>-->
                                                                            <div class="steprow text-center" v-if="schoice">
                                                                            <!--<div v-html="schoice.htmlcode"></div>-->
                                                                           
                                                                                <div v-if="schoice.choice_id == 2" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <select :id="'ans'+schoice.id">
                                                                                        <option>Select</option>
                                                                                        <option v-if="schoice['question_value'].length != 0" v-for="(choicesValue,index) in schoice['question_value']">{{ schoice['question_value'][index] }}</option>
                                                                                    </select>
                                                                                    <br/>
                                                                                    <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 3" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <div v-if="schoice['question_value'].length == 0">
                                                                                        <input type="radio" name="choice" >
                                                                                    </div>
                                                                                    <div v-else v-for="(choice,index) in schoice['question_value']">
                                                                                    <input :id="'ans'+schoice.id" type="radio" name="choice"  :value="schoice['question_value'][index]"> {{ schoice['question_value'][index] }}
                                                                                    </div>
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>    
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 4" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <div v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                        <input :id="'ans'+schoice.id" type="radio" name="radiotype"  :value="schoice['question_value'][index]"> {{ schoice['question_value'][index] }}
                                                                                    </div>
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id,schoice.choice_id)">Continue</button>
                                                                                </div>
                                                                                
                                                                                <div v-if="schoice.choice_id == 5" :id="schoice.sort" class="show1" style="display:none;">
                                                                                {{ 'sbhjbcsj' }}
                                                                                    <div v-if="schoice['question_value'].length == 0" v-for="(choice,index) in schoice['question_value']">
                                                                                    
                                                                                        <ul style="list-style:none;"><li><div class="quizcolor-box" ><div class="quizcolor-thumb" style="'background-image: url('stepimg.jpg')'"></div><div class="quizcolor-inner"><div class="custom-control custom-checkbox mr-sm-2">
                                                                                        <input :id="'ans'+schoice.id" class="custom-control-input" type="radio" name="radio" ><label class="custom-control-label"></label></div></div></div></li></ul>
                                                                                    </div>
                                                                                    <div v-else v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                    <div class="quizcolor-div">
                                                                                    <ul class="quizcolor-row" id="frameulp">
                                                                                        <li id="prevCol">
                                                                                            <div class="quizcolor-box" style="height: 230px;width: 180px;">
                                                                                                <div class="quizcolor-thumb" id="ColImg" :style="'background-image: url(images/'+schoice['question_value'][index]+')'"></div>
                                                                                                    <div class="quizcolor-inner">
                                                                                                        <div class="custom-control custom-checkbox mr-sm-2">
                                                                                                        <input class="custom-control-input"  type="checkbox" :value="index" name="checkbox[]" :id="'frames_cols'+schoice.id+'_'+index"><label class="custom-control-label"  :id="'ColText'+index" :for="'frames_cols'+schoice.id+'_'+index">{{ schoice['question_value_1'][index] }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </li>
                                                                                    </ul>            
                                                                                        </div>
                                                                                        </div>
                                                                                    <br/>
                                                                                    {{ schoice.id }}
                                                                                    {{ schoice.sort }}
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id,schoice.choice_id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 6" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <textarea :id="'ans'+schoice.id" placeholder="Type your statement here"></textarea>
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 7" :id="schoice.sort" class="show1" style="display:none;">
                                                                                     <input :id="'ans'+schoice.id" type="text" placeholder="Type your answer here" class="lq-input">
                                                                                    <!-- <input type="text" placeholder="Type your answer here" class="lq-input"  value="" v-else>-->
                                                                                     <br/>
                                                                                      <br/>
                                                                                     <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 8" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <textarea :id="'ans'+schoice.id" placeholder="Type your answer here" name="longtext" rows="4" cols="35"></textarea>
                                                                                    <!--<textarea id="focus" placeholder="Type your answer here" name="longtext" rows="4" cols="35" v-else></textarea>-->
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 9" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <input :id="'mm'+schoice.id" placeholder="MM" name="MM" type="text" maxlength="2" style="max-width: 45px;"> / <input :id="'dd'+schoice.id" placeholder="DD" name="DD" type="text" maxlength="2" style="max-width: 45px;"> / <input :id="'yy'+schoice.id" placeholder="YYYY" name="YYYY" type="text" maxlength="4" style="max-width: 60px;"> 
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id,schoice.choice_id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 10" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <input type="text" :id="'ans'+schoice.id" placeholder="Type your name here" class="lq-input">
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 11" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <input type="email" :id="'ans'+schoice.id" placeholder="Your Email" class="lq-input">
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 12" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <input type="tel" :id="'ans'+schoice.id" placeholder="Your Phone" class="lq-input">
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 13" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <div v-if="schoice['question_value'].length != 0" v-for="(choice,index) in schoice['question_value']">
                                                                                        <input type="radio" name="gdprtype" :id="'ans'+schoice.id" :value="schoice['question_value'][index]"> {{ schoice['question_value'][index] }}
                                                                                    </div>
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id,schoice.choice_id)">Continue</button>
                                                                                </div>
                                                                                <div v-if="schoice.choice_id == 14" :id="schoice.sort" class="show1" style="display:none;">
                                                                                    <select :id="'ans'+schoice.id">
                                                                                        <option>Select</option>
                                                                                        <option v-if="collection != 0" v-for="(collection1,index) in collection">{{ collection1.title }}</option>
                                                                                    </select>
                                                                                    <br/>
                                                                                     <br/>
                                                                                    <button id="btn" class="btn btn-info" @click="FrameSelection('Take',schoice.sort,schoice.id)">Continue</button>
                                                                                </div>

                                                                            </div>
                                                                           
                                                                    </div>
                                                                    
                                                                </div>
                                                            </section>
                                                        </div>    
                                                    </div>
                                                    </div>
                                                    <br/>
                                                    
                                        </div>
                                         <div class="quiz-pro-box" v-else>
                                                <h4>Data Not Found</h4>
                                        </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="s3" style="display:none;">
                <div class="quiz-container" :style="'background-color:'+basicInfo[0].bgcolor">
                    <button type="button" class="close" aria-label="Close" id="close-mod" @click="closeModal()" style="margin-right: 40px;margin-top: 40px;font-size: 50px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="qc-table">
                        <div class="qc-tcell">
                            <div class="centered qc-first">
                                <div class="qb-header">    
                                    <h4>{{ basicInfo[0].quiz_thankyou }}</h4>
                                    <!--<p>{{ basicInfo[0].title_2 }}</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                quizId:'',
                basicInfo:[],
                selChoice:[],
                popShow:true,
                quizShow:false,
                colorShow:false,
                sort : '',
                ansArr : {
                    answer : '',
                    choiceid : ''
                },
                collection: []

            }
        },
        created(){
            this.fetchCollection();
        },
        methods:{ 
            fetchCollection(){
                var quizId = this.$session.get('quizId');
                this.quizId = quizId;
                //this.new_Frame.quizId=this.quizId;
                var url = 'api/basicInfo/'+quizId;
                fetch(url)
                .then(res => res.json())
                .then(res => { 
                     console.log(res);
                    if(res){
                        //this.basicInfo.push(res.basic_infos[0]);
                        if(res.frames.length != 0){
                            for(var i=0;i<res.frames.length;i++){
                                this.selChoice.push(res.frames[i]);
                            } 
                        }

                         if(res.basic_infos.length != 0){
                            for(var i=0;i<res.basic_infos.length;i++){
                                this.basicInfo.push(res.basic_infos[i]);
                            } 
                        }
                        
                        for(var i=0;i<res.collection.response.length;i++){
                            this.collection.push(res.collection.response[i]);
                        } 
                        //console.log(this.basicInfo[0].bgcolor);
                        //this.frames.push(res.frames);
                    }  
                });
            },
            FrameSelection(type,sort,id,choiceid){
                this.sort = sort;
                if(type == 'Take Quiz'){
                    this.popShow = false;
                    this.quizShow = true;
                }
            this.ansArr.choiceid = choiceid;
            if(choiceid == 4){
                    var radioValue = $("input[name='radiotype']:checked").val();
                    this.ansArr.answer = radioValue;
            }
            else if(choiceid == 13){
                    var radioValue1 = $("input[name='gdprtype']:checked").val();
                    this.ansArr.answer = radioValue1;
            }
            else if(choiceid == 5){
                    var finalVal = $("input[name='checkbox[]']").val();
                    var favorite = [];
                    $.each($("input[name='checkbox[]']:checked"), function(){
                        favorite.push($(this).val());
                    });
                    this.ansArr.answer = favorite;
            }
            else if(choiceid == 9){
                var mm = $('#mm'+id).val();
                var dd = $('#dd'+id).val();
                var yy = $('#yy'+id).val();
                var finalVal = mm+'/'+dd+'/'+yy;
                this.ansArr.answer = finalVal;
              
            }else{
                 this.ansArr.answer = $('#ans'+id).val();
            }
            //alert(this.ansArr.answer);
            var url = 'api/getSelChoice/'+this.quizId+'/'+sort+'/'+id;
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(this.ansArr),
                    headers:{
                        'content-type':'application/json'
                 }
                })
                .then(res => res.json())      
                .then(res => { 
                    if(res == 'hii'){
                         $('.show1').css('display','none');
                         $('#s3').css('display','block');
                    }else{
                        $('.show1').css('display','none');
                        $('#'+res).css('display','block');
                    }
                });

            },
            closeModal(){
                window.top.location = '/Quiz_App';
            }
        }
    }
</script>