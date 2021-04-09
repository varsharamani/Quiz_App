<template>
    <div>
         <main class="">
         <input type="hidden" id="sdate" value="2021-04-05">
        <div class="app-wrapper matrix-filter">
            <div class="main-container">
                <div class="topbar">
                    <div class="t-navbar">
                        <div class="breadcrumbs">
                            <a href="javascript:void(0);" @click="redirectDas('dashboard',quizId)" class="back-link"> Dashboard </a>
                             <span>/ <span class="current-title">{{ quizData.quiz_name }}</span></span>
                        </div>
                        <div class="right-menu">
                            <a href="" class="btn btn-sm btn-themec btn-preview" > <i class="fas fa-eye"></i> Preview Quiz</a>
                        </div>
                        <div class="topnav-wrap">
                            <ul class="navbar-wrap">
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0);" @click="redirectDas('home')">Back to Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0);" @click="redirectDas('publish',quizId)">Publish</a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
                <section class="app-apart">
                    <div class="app-position">
                        <div class="app-builder aap-second">
                            <div class="ab-wrap publish-container">
                                <div class="app-row row mt-5">
                                    <div class="col-4">
                                        <div class="builder-logic- matrix-tab">
                                            <div class="padd20">
                                                <div class="publish-tab"> 
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="analytics-tab" data-toggle="tab" href="#analytics" role="tab" aria-controls="analytics" aria-selected="true" @click="showContent(1);"><span>Analytics</span></a>
                                                        </li>
                                                       <li class="nav-item">
                                                            <a class="nav-link" id="responses-tab" data-toggle="tab" href="#responses" role="tab" aria-controls="responses" aria-selected="false" @click="showContent(2);"><span>Responses</span></a>
                                                        </li> 
                                                       <!--  <li class="nav-item">
                                                            <a class="nav-link" id="inline-tab" data-toggle="tab" href="#inline" role="tab" aria-controls="inline" aria-selected="false"><span>Inline</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="automatic-tab" data-toggle="tab" href="#automatic" role="tab" aria-controls="automatic" aria-selected="false"><span>Automatic</span></a>
                                                        </li> -->
                                                    </ul>

                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="analytics" role="tabpanel" aria-labelledby="analytics-tab">
                                                            <div class="pt-content ">
                                                                <div class="clearfix matrix-tab-scroll ">
                                                                    <p>Check out your quiz's performance during a particular period of time</p>
                                                                    <div class="metrics-box box-sm box-shadow">
                                                                        <p>Starts</p>
                                                                        <h2 id="Start"></h2> 
                                                                       
                                                                    </div>
                                                                    <div class="metrics-box box-sm box-shadow fright">
                                                                        <p>Responses</p>
                                                                        <h2 id="finish"></h2> 
                                                                       
                                                                    </div>
                                                                    <div class="metrics-box box-sm box-shadow">
                                                                        <p>Comp. Rate</p>
                                                                        <h2 id="comRate"></h2> 
                                                                        
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade show active" id="responses" role="tabpanel" aria-labelledby="responses-tab" style="display: none;">
                                                            <div class="pt-content ">
                                                                <div class="clearfix matrix-tab-scroll">
                                                                    <p>Click on any of the responses to see what each customer has answered </p>  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-8">
                                        <div class="padd20" id="analytics1">
                                            <div class="date--chart" id="link1">
                                                <div class="dc-for">
                                                    <input type="text" name="daterange" id="daterange" />
                                                </div>
                                            </div>
                                             <figure class="highcharts-figure">
                                                <div id="start"></div>
                                            </figure>
                                            <figure class="highcharts-figure">
                                                <div id="response"></div>
                                            </figure>
                                            <figure class="highcharts-figure">
                                                <div id="cr"></div>
                                            </figure>
                                            
                                           
                                        </div>
                                        <div id="responses1" style="display:none;">
                                        <div class="air-preview box-shadow bg-white padd20" >
                                        gdfoig
                                        </div>
                                        </div>
                                       <!-- <div class="bg-white" id="responses1" style="display: none;">
                                           <div class="air-preview box-shadow bg-white padd20" id="response">
                                                <?php $new_date = ''; if(!empty($responseData)) { for($i=0;$i<1;$i++){
                                                    $frame = '';
                                                    $allframeArr = explode(",",$responseData[$i]->frame);
                                                    for($j=0;$j<count($allframeArr);$j++){
                                                         $frameArr = DB::select('SELECT * from mirrormates where id = '.$allframeArr[$j]);
                                                         $frame.=$frameArr[0]->frame.', ';

                                                    } }

                                                    $colorArr = array();
                                                    $colorArr = explode(",",$responseData[0]->color);

                                                    
                                                        $old_date_timestamp = strtotime($responseData[0]->created_at);
                                                        $new_date = date('M d, Y  H:i', $old_date_timestamp);  
                                                    
                                                    
                                                } 
                                                ?>
                                                <?php if(!empty($responseData)){ ?>
                                                <div class="respon-title">
                                                    <?php echo $new_date.' - '.$quizData[0]->quiz_name; ?>
                                                </div>
                                                
                                                <div class="response-list clearfix">
                                                    <span class="img-icon"><svg data-v-192c7a0b="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fa-fw svg-inline--fa fa-image fa-w-16"><path data-v-192c7a0b="" fill="currentColor" d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z" class=""></path></svg></span>
                                                    <p>Let's start with your style. Is it more... </p>
                                                    <span><?php if(isset($frame)) echo rtrim($frame,', '); ?></span>
                                                </div>
                                                <?php if(!empty($colorArr)) { for($j=0;$j<count($colorArr);$j++){ 
                                                    $color = array();
                                                     $color = DB::select('SELECT * from colors where id = '.$colorArr[$j]);
                                                ?>
                                                    <div class="response-list clearfix">
                                                        <span class="img-icon"><svg data-v-192c7a0b="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fa-fw svg-inline--fa fa-image fa-w-16"><path data-v-192c7a0b="" fill="currentColor" d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z" class=""></path></svg></span>
                                                        <p>You Chose <?php echo $color[0]->frame; ?></p>
                                                    </div>
                                                <?php } } } ?>
                                            </div>
                                        </div>-->
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                startDate : '',
                endDate : '',
                quizId : '',
                quizData : {
                    quiz_name : ''
                }
            }
        },
        beforeMount(){
             this.selectedChoice1();
        },
        mounted(){
            var quizId = this.$session.get('quizId');
                this.quizId = quizId;
                var url = 'api/matrixData/'+quizId;
                fetch(url)
                .then(res => res.json())
                .then(res => { 
                    this.startDate = res.startDate;
                    this.endDate = res.endDate;
                    $('#Start').text('');
                    $('#finish').text('');
                    $('#comRate').text('');
                    $('#Start').text(res.startsData);
                    $('#finish').text(res.finishData);
                    $('#comRate').text(res.comRate+' %');
                    this.startsChart(res.seriesData,res.stotalStarts,res.seriesDataR,res.totalresponses,res.seriesDataCR,res.totalCR);
                });
            setTimeout(() => {  var d1 = this.startDate;
                $('input[name="daterange"]').daterangepicker({
                locale: {
                format: 'YYYY-MM-DD'
                },
                opens: 'left',
                startDate: d1,
                endDate: new Date(),
                maxDate: new Date()
                }, function(start, end, label) {
                }); 
            }, 2000);           
        },
        methods:{
            selectedChoice1(){
                var quizId = this.$session.get('quizId');
                this.quizId = quizId;
                var url = 'api/selChoice/'+quizId;
                fetch(url)
                .then(res => res.json())
                .then(res => { 
                   if(res.quizData.length != 0){
                        for(var i=0;i<res.quizData.length;i++){
                            this.quizData.quiz_name = res.quizData[i].quiz_name;
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
                }else if(type == 'home'){
                    window.location.href="quiz";
                } 
            },
            showContent(type){
                alert(type);
                if(type == 1){
                    $('#analytics1').css('display','block');
                    $('#responses1').css('display','none');
                    $('#responses').css('display','none');
                }else if(type == 2){
                    $('#analytics1').css('display','none');
                    $('#responses1').css('display','block');
                    $('#responses').css('display','block');
                }
            },
            startsChart(dataS,max1,dataR,max2,dataCR,max3){
                var sdate = this.startDate;
                var sdateArr = sdate.split("-");
                var edate = this.endDate;
                var edateArr = edate.split("-");
               
                var startDate1 = new Date(sdate);
                var makeDate = new Date(startDate1.setMonth(startDate1.getMonth() - 1));
                var prevM = makeDate.getMonth()+1;

                var endDate1 = new Date(edate);
                var makeDateE = new Date(endDate1.setMonth(endDate1.getMonth()));
                var prevME = makeDateE.getMonth();

                if(prevM == 12){
                sdateArr[0] = sdateArr[0]-1;
                }
                if(prevME == 12){
                edateArr[0] = edateArr[0]-1;
                }

                var dateE = new Date(edate);
                var day = dateE.getDay();   
                console.log(sdateArr[0], prevM, sdateArr[2]);
                console.log(edateArr[0], prevME,edateArr[2]);

                //Starts
                $('#start').highcharts({
                    chart: {
                    type: 'spline'
                    },
                    tooltip: {
                        shared: true,
                        split: false,
                        enabled: true
                    },
                    title: {
                    text: 'Number of Starts',
                    align:'left'
                    },
                    subtitle: {
                    text: ' '
                    },
                    xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%e %b }'
                    },
                    startOfWeek:day,
                    startOnTick: true,
                    min: Date.UTC(sdateArr[0], prevM, sdateArr[2]),
                    max: Date.UTC(edateArr[0], prevME,edateArr[2]),
                    tickInterval: 7 * 24 * 3600 * 1000 // interval of 1 day
                    },
                yAxis: {
                        title: {
                            text: ' '
                        },
                        min:0,
                        max:max1
                    },
                    credits: {
                        enabled: false
                    },
                    exporting: { 
                        enabled: false 
                    },
                    colors: ['#1E90FF', '#FF8C00','#FF8C00'],
                    series: eval(dataS)
                });
                
                //Response
                $('#response').highcharts({
                    chart: {
                    type: 'spline'
                    },
                    tooltip: {
                        shared: true,
                        split: false,
                        enabled: true
                    },
                    title: {
                    text: 'Number of Responses',
                    align:'left'
                    },
                    subtitle: {
                    text: ' '
                    },
                    xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%e %b }'
                    },
                    startOfWeek:day,
                    startOnTick: true,
                    min: Date.UTC(sdateArr[0], prevM, sdateArr[2]),
                    max: Date.UTC(edateArr[0], prevME,edateArr[2]),
                    tickInterval: 7 * 24 * 3600 * 1000 // interval of 1 day
                    },
                yAxis: {
                        title: {
                            text: ' '
                        },
                        min:0,
                        max:max2
                    },
                    credits: {
                        enabled: false
                    },
                    exporting: { 
                        enabled: false 
                    },
                    colors: ['#1E90FF', '#FF8C00','#FF8C00'],
                    series: eval(dataR)
                });

                //CR
                $('#cr').highcharts({
                    chart: {
                    type: 'spline'
                    },
                    tooltip: {
                        shared: true,
                        split: false,
                        enabled: true
                    },
                    title: {
                    text: 'Number of CR',
                    align:'left'
                    },
                    subtitle: {
                    text: ' '
                    },
                    xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%e %b }'
                    },
                    startOfWeek:day,
                    startOnTick: true,
                    min: Date.UTC(sdateArr[0], prevM, sdateArr[2]),
                    max: Date.UTC(edateArr[0], prevME,edateArr[2]),
                    tickInterval: 7 * 24 * 3600 * 1000 // interval of 1 day
                    },
                yAxis: {
                        title: {
                            text: ' '
                        },
                        min:0,
                        max:max3
                    },
                    credits: {
                        enabled: false
                    },
                    exporting: { 
                        enabled: false 
                    },
                    colors: ['#1E90FF', '#FF8C00','#FF8C00'],
                    series: eval(dataCR)
                });
            }   
        }
    }
</script>