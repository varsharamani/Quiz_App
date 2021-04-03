<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('resources/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/front-style.css') }}">
       <style>
       /* image quizimg */
            .qp-container .qp-images .quiz-wrapp {
                max-width: 960px;
            }
            .quizimg-div,
            .quizcolor-div {
                max-width: 700px;
                margin: 0 auto;
                margin-top: 30px;
            }
            .quizimg-row,
            .quizcolor-row{
                list-style: none;
                padding-left: 0px;
            }
            .quizimg-row,
            .quizcolor-row{
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                margin: 0px -7px;
            }
            .quizimg-row  > li,
            .quizcolor-row > li{
                flex: 0 0 33.333%;
                -ms-flex: 0 0 33.333%;
                max-width: 33.333%;
                padding: 0px 7px;
                position: relative;
            }
            .quizimg-box,
            .quizcolor-box{
                padding: 8px;
                background-color: rgba(6,54,102,0.2);
                margin-bottom: 15px;
                border-radius: 4px;
                cursor: pointer;
            }
            .quizimg-thumb,
            .quizcolor-thumb{
                width: 100%;
                padding-top: 100%;
                background-color: hsla(0,0%,100%,.5);
                background-position: 50%;
                background-repeat: no-repeat;
                background-size: contain;
            }
            .quizimg-inner,
            .quizcolor-inner {
                margin-top: 8px;
            }
            .quizimg-radio,
            .quizcolor-radio{
                position: relative;
                width: 22px;
                height: 22px;
                border: none;
                border-radius: 50%;
                background-color: hsla(0,0%,100%,.6);
                text-align: center;
                margin-right: 10px;
                font-size: 14px;
                display: inline-block;
                vertical-align: top;
                position: relative;
            }
            .quizimg-radio::before,
            .quizcolor-radio::before{
                content: "";
                width: 12px;
                height: 12px;
                display: inline-block;
                background: transparent;
                border-radius: 100%;
                position: absolute;
                top: 5px;
                left: 5px;
            }
            .quizimg-title,
            .quizcolor-title {
                color: #063666;
                display: inline-block;
                width: calc(100% - 40px);
                vertical-align: top;
                text-align: left;
                font-size: 18px;
                line-height: normal;
                vertical-align: top;
            }
            .quizimg-box:hover .quizimg-radio::before,
            .quizcolor-box:hover .quizcolor-radio::before {
                background: #ffffff;
            }
            .quizimg-box:hover .quizimg-radio,
            .quizcolor-box:hover .quizcolor-radio {
                background-color: #155769;
            }
            .quizimg-box .quizimg-box .quizimg-radio::before,
            .quizcolor-color .quizcolor-box-color .quizcolor-radio::before{
                display: none;
            }
            .quizimg-row > li.active > .quizimg-box .quizimg-radio,
            .quizcolor-row > li.active > .quizcolor-box .quizcolor-radio{
                background-size: 12px;
                background-repeat: no-repeat;
                background-position: 50% 50%;
                background-image: url(https://cdn.shopify.com/s/files/1/0350/5894/1996/files/check-quiz.svg?v=1607147002);
                background-color: #155769;
            }

            /* publish page css */
            .publish-container {
                max-width: 1024px;
                margin: 25px auto 0;
            }
       </style>

    </head>
    <body>
        <div id="app">
             <div class="content">
                    <Previewquiz></Previewquiz>
            </div>
       </div>
       <script src="{{ asset('js/app.js') }}"></script>
       <script src="{{ asset('js/jquery.min.js') }}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script> 
   
    </body>
</html>
