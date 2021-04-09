<template>
    <div>
        <main class="">
            <div class="quiz-dash">
                    <div class="dash-quiz" v-if="Quiz" v-for="quiz in Quiz" :key="quiz.id" :id="'quiz'+quiz.id" >
                        <a href="#" style="color: black;">
                                {{ quiz.quiz_name }}
                        </a>
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background-color: #62ded5; border-color: #62ded5;">
                            <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);" @click="editQuiz(quiz.id)">Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);" @click="deleteQuiz(quiz.id)">Delete</a>
                            <a class="dropdown-item" href="javascript:void(0);" @click="redirectDas('publish',quiz.id)">Publish</a>
                            <a class="dropdown-item" href="javascript:void(0);" @click="redirectDas('Metrics',quiz.id)">Metrics</a>
                        </div>
                    </div> 
                    </div>

                <span class="dash-quiz new" data-toggle="modal" data-target="#myModal">
                <div class="aquiz-box">
                    <span>+</span>
                    <span>add new quiz</span>
                </div>
                </span>
            </div>

            <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">New Quiz</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <label>Quiz Name</label><br/>
                            <input type="text" name="quiz_name" id="quiz_name" class="el-input__inner" autocomplete="off">
                            <p id="msg" style="display: none;color: red;">Please enter quiz name</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click="addQuiz();">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
      export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
            Quiz:[],
            QuizData:{
                 quiz_name : ''
            }
            }
        },
        created(){
            this.fetchData();
        },
        methods:{
            fetchData(){
                var url = 'api/Quiz'
                fetch(url)
                .then(res => res.json())
                .then(res => {
                    if(res.length != 0){
                        for(var i=0;i<res.length;i++){
                           this.Quiz.push(res[i]);
                        } 
                    }    
                });
            },
            editQuiz(quizId){
                this.$session.set('quizId',quizId)
                var url = 'api/Quiz/'+quizId
                fetch(url)
                .then(res => res.json())
                .then(res => {
                   console.log(res);

                   window.location.href='quiz';
                });
            },
            addQuiz(){
                var quiz_name = $('#quiz_name').val();
                if(quiz_name == ''){
                    alert('Please enter quiz name');
                    return false;
                }
                this.QuizData.quiz_name = quiz_name;
                var url = 'api/addQuiz';
               fetch(url,{
                method:'POST',
                body:JSON.stringify(this.QuizData),
                headers:{
                    'content-type':'application/json'
                }
                })
                .then(res => res.json())
                .then(res => {
                   this.$session.set('quizId',res)
                    window.location.href='quiz';
                }); 
            },
            deleteQuiz(quizId){
                var url = 'api/QuizDel/'+quizId
                fetch(url)
                .then(res => res.json())
                .then(res => {
                     $('#quiz'+quizId).remove();
                     alert('Quiz Delete Successfully');
                    //console.log(res);
                    //window.location.href='quiz';  
                });
            },
            redirectDas(type,quizId){
                //alert(quizId);
                this.$session.set('quizId',quizId)
                if(type == 'dashboard'){
                    window.location.href="/Quiz_App";
                }else if(type == 'publish'){
                    window.location.href="publish";
                }else if(type == 'previewQuiz'){
                    window.location.href="previewQuiz";
                }
                else if(type == 'Metrics'){
                    window.location.href="matrix";
                }
                //window.open(url, '_blank');
                
            },
           
        }
    }
</script>