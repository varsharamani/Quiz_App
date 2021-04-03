<template>
    <div>
        <main class="">
            <div class="app-wrapper">
                <div class="main-container">
                    <div class="topbar">
                        <div class="t-navbar">
                            <div class="breadcrumbs">
                                <a href="javascript:void(0);" class="back-link" @click="redirectDas('dashboard')"> Dashboard</a> 
                                <span class="current-title"> / Frame Help Quiz</span>
                            </div>
                            <div class="right-menu">
                                <a href="" class="btn btn-sm btn-themec btn-preview" target="_blank"> <i class="fas fa-eye"></i> Preview Quiz</a>
                            </div>
                            <div class="topnav-wrap">
                                <ul class="navbar-wrap">
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" @click="redirectDas('home')">Back to Home</a>
                                    </li>
                                <!--  <li class="nav-item">
                                        <a class="nav-link <?php if(Request::url() == url('/publish')) { echo 'active'; } ?>" href="{{ url('/publish') }}" >Publish</a>
                                    </li> -->
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
                                            <div class="builder-logic">
                                                <div class="padd20">
                                                    <div class="publish-tab"> 
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="link-tab" data-toggle="tab" href="#link" role="tab" aria-controls="link" aria-selected="true"><span>Installation Code</span></a>
                                                            </li>
                                                        <!--   <li class="nav-item">
                                                                <a class="nav-link" id="buttons-tab" data-toggle="tab" href="#buttons" role="tab" aria-controls="buttons" aria-selected="false" onclick="show('button')"><span>Button</span></a>
                                                            </li> -->
                                                        <!--  <li class="nav-item">
                                                                <a class="nav-link" id="inline-tab" data-toggle="tab" href="#inline" role="tab" aria-controls="inline" aria-selected="false"><span>Inline</span></a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="automatic-tab" data-toggle="tab" href="#automatic" role="tab" aria-controls="automatic" aria-selected="false"><span>Automatic</span></a>
                                                            </li> -->
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="link" role="tabpanel" aria-labelledby="link-tab">

                                                                <div class="pt-content">
                                                                    <h6><b>Step 1: </b>Include This Js in Footer</h6> 
                                                                    <p><b>https://script.mirrormate.com/mirrormate_quiz/public/js/quiz-frame.js</b></p>
                                                                    <h6><b>Step 2: </b>Where You Want Link Copy Below Code as a href</h6>
                                                                    <p><b>https://www.mirrormate.com/#quiz-{{ (quizId) }}</b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="padd20">
                                                <div class="air-preview box-shadow bg-white" id="link1">
                                                    <div class="air-header">
                                                        <div class="air-circle air-close"></div>
                                                        <div class="air-circle air-minmize"></div>
                                                        <div class="air-circle air-maximize"></div>
                                                    </div>
                                                    <div class="air-content">
                                                        <div class="air-bar-top"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar w-75"></div>
                                                        <br>
                                                        <br>
                                                        <div class="text-center">
                                                            <button class="popup-link" style="color: rgb(68, 153, 255); font-size: 18px;">TAKE OUR QUIZ</button>
                                                            <div class="popup-helper font-sm">Click to preview popup</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="air-preview box-shadow bg-white" id="button" style="display: none;">
                                                    <div class="air-header">
                                                        <div class="air-circle air-close"></div>
                                                        <div class="air-circle air-minmize"></div>
                                                        <div class="air-circle air-maximize"></div>
                                                    </div>
                                                    <div class="air-content">
                                                        <div class="air-bar-top"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar"></div>
                                                        <div class="air-bar w-75"></div>
                                                        <br>
                                                        <br>
                                                        <div class="text-center">
                                                            <input type="button" id="btn" value="<?php if(isset($data[0]->btn_text)) { echo $data[0]->btn_text; }  ?>" style="font-size:<?php if(isset($data[0]->btn_font_size)) { echo $data[0]->btn_font_size;; echo 'px'; }  ?>;background-color:<?php if(isset($data[0]->btn_color)) { echo $data[0]->btn_color;} ?>;color:<?php if(isset($data[0]->btn_text_color)) { echo $data[0]->btn_text_color;} ?>;border-radius:<?php if(isset($data[0]->btn_border_radius)) { echo $data[0]->btn_border_radius;; echo 'px'; }  ?>">
                                                            <div class="popup-helper font-sm">Click to preview popup</div>
                                                        </div>
                                                    </div>
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
        </main>
    </div>
</template>

<script>
    export default {
        
        data(){
            return {
                quizId : ''
            }
        },
        mounted() {
            console.log('Component mounted.');
            var quizId = this.$session.get('quizId');
                this.quizId = btoa(quizId);
               // alert(this.quizId);
        },
        methods:{
            redirectDas(type,quizId){
                if(type == 'dashboard'){
                    window.location.href="/Quiz_App";
                }else if(type == 'home'){
                    window.location.href="quiz";
                }   
            },
        }
    }


</script>

