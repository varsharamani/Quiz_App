<template>
     <main class="">
        <div class="app-wrapper">
            <div class="main-container">
                <div class="topbar">
                    <div class="t-navbar">
                        <div class="breadcrumbs">
                            <a href="#" class="back-link"> Dashboard </a>
                            <span>/ <span class="current-title">Fame Help Quiz</span></span>
                        </div>
                        <div class="right-menu">
                            <a href="#" class="btn btn-sm btn-themec btn-preview" target="_blank"> <i class="fas fa-eye"></i> Preview Quiz</a>
                        </div>
                        <div class="topnav-wrap">
                            <ul class="navbar-wrap">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Create</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Publish</a>
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
                                    <div class="col-6 quiz-bilder">
                                        <div class="qb-header">
                                            <h5> <b>Quiz Builder</b> - <a class="qbh-link" href="#">Learn how the quiz buider works</a></h5>
                                        </div>
                                        <div class="padd20">
                                            <div class="steps">  <!--stepbox--> <!-- "step-active" class for active -->
                                                <div class="steps-box step-shadow">
                                                    <div class="step-no">
                                                        <div class="step-type">
                                                            <i class="fas fa-comment-dots"></i> <span>1</span>
                                                        </div>
                                                    </div>
                                                    <div class="step-content">
                                                        <div class="steprow">
                                                            <div class="step-title">
                                                                <textarea class="form-control sr-area" name="" id="" rows="1" >With 65 frame styles it can be hard to choose! </textarea>
                                                            </div>
                                                            <div class="step-description">
                                                                <textarea class="form-control sr-area" name="" id="" rows="1">Take our quiz and find the style that fits you best. </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="steprow text-center">
                                                            <button id="" class="btn btn-theme">Start Your Style Quiz</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="steps">  <!--stepbox--> 
                                                <div class="steps-box step-shadow">
                                                    <div class="step-no">
                                                        <div class="step-type">
                                                            <i class="far fa-image"></i> <span>2</span>
                                                        </div>
                                                    </div>
                                                    <div class="step-content">
                                                        <div class="steprow">
                                                            <div class="step-title">
                                                                <textarea class="form-control sr-area" name="" id="" rows="1" >Let's start with your style. Is it more... </textarea>
                                                            </div>
                                                            <div class="step-description">
                                                                <textarea class="form-control sr-area" name="" id="" rows="1">(Select one. Don’t worry you can take this quiz again!) </textarea>
                                                            </div>
                                                            <div class="step-choice w-100 mb-30">
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="" class="new-choice"> <!-- Repeat columns -->
                                                                    <div class="sc-row">
                                                                        <hr>
                                                                        <div class="sc-choice">
                                                                            <span class="stepimg">
                                                                                <div class="imgpreview" style="background-image: url(stepimg.jpg);"></div>
                                                                            </span>
                                                                            <span class="stepbullet">- </span>
                                                                            <!-- <input class="form-control" placeholder="" value="Traditional"> -->
                                                                            <div class="dropdown step-drop">
                                                                                <button class="btn btn-themec dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  Dropdown button
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                  <a class="dropdown-item" href="#">Action</a>
                                                                                  <a class="dropdown-item" href="#">Another action</a>
                                                                                  <a class="dropdown-item" href="#">Something else here</a>
                                                                                </div>
                                                                              </div>
                                                                            <span id="add" class="choicestep">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span id="remove" class="choicestep">
                                                                                <i class="fas fa-minus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 quiz-preview">
                                        <div class="qp-container">
                                            <div class="qp-full">
                                                <div id="qp-quiz" class="qp-quiz">
                                                    <section id="popup-view" class="qp-slide qp-cover" style="display: none;">
                                                        <div class="quiz-box">
                                                            <div class="quiz-wrapp">
                                                                <h1>With 65 frame styles it can be hard to choose! </h1>
                                                                <p>Take our quiz and find the style that fits you best. </p>
                                                                <div class="lq-group">
                                                                    <button class="btn btn-themec">Start Your Style Quiz</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section id="product-loop" class="qp-slide qp-images qp-cover" style="">
                                                        <div class="quiz-box">
                                                            <div class="quiz-wrapp">
                                                                <h1>Let's start with your style. Is it more...</h1>
                                                                <p>(Select one. Don’t worry you can take this quiz again!)</p>
                                                                <div class="quizimg-div">
                                                                    <ul class="quizimg-row">
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizimg-box">
                                                                                <div class="quizimg-thumb" style="background-image: url(quiz-pro.jpg);"></div>
                                                                                <div class="quizimg-inner">
                                                                                    <span class="quizimg-radio"></span>
                                                                                    <span class="quizimg-title">Bronze</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section id="color-loop" class="qp-slide qp-color qp-cover" style="display: none;">
                                                        <div class="quiz-box">
                                                            <div class="quiz-wrapp">
                                                                <h1>You chose Farmhouse & Rustic.</h1>
                                                                <p>Now, what color frame would you choose for a picture hung in the bath? (Select one)</p>
                                                                <div class="quizcolor-div">
                                                                    <ul class="quizcolor-row">
                                                                        <li>
                                                                            <div class="quizcolor-box">
                                                                                <div class="quizcolor-thumb" style="background-image: url(qi-color.jpg);"></div>
                                                                                <div class="quizcolor-inner">
                                                                                    <span class="quizcolor-radio"></span>
                                                                                    <span class="quizcolor-title">Black</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizcolor-box">
                                                                                <div class="quizcolor-thumb" style="background-image: url(qi-color.jpg);"></div>
                                                                                <div class="quizcolor-inner">
                                                                                    <span class="quizcolor-radio"></span>
                                                                                    <span class="quizcolor-title">Black</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizcolor-box">
                                                                                <div class="quizcolor-thumb" style="background-image: url(qi-color.jpg);"></div>
                                                                                <div class="quizcolor-inner">
                                                                                    <span class="quizcolor-radio"></span>
                                                                                    <span class="quizcolor-title">Black</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizcolor-box">
                                                                                <div class="quizcolor-thumb" style="background-image: url(qi-color.jpg);"></div>
                                                                                <div class="quizcolor-inner">
                                                                                    <span class="quizcolor-radio"></span>
                                                                                    <span class="quizcolor-title">Black</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizcolor-box">
                                                                                <div class="quizcolor-thumb" style="background-image: url(qi-color.jpg);"></div>
                                                                                <div class="quizcolor-inner">
                                                                                    <span class="quizcolor-radio"></span>
                                                                                    <span class="quizcolor-title">Black</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizcolor-box">
                                                                                <div class="quizcolor-thumb" style="background-image: url(qi-color.jpg);"></div>
                                                                                <div class="quizcolor-inner">
                                                                                    <span class="quizcolor-radio"></span>
                                                                                    <span class="quizcolor-title">Black</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="quizcolor-box">
                                                                                <div class="quizcolor-thumb" style="background-image: url(qi-color.jpg);"></div>
                                                                                <div class="quizcolor-inner">
                                                                                    <span class="quizcolor-radio"></span>
                                                                                    <span class="quizcolor-title">Black</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
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
                    </div>
                </section>
            </div>
        </div>
    </main>
</template>