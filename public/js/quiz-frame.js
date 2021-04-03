"use strict";

(function () {
  var popupInline = function popupInline() {

    /* REMOVE ALL DUPLICATE IFRAMES FIRST */
    if (document.querySelectorAll('.mm-widget iframe')) {
      document.querySelectorAll('.mm-widget iframe').forEach(function (el) {
        el.remove();
      });
    }
          
    /* THEN RENDER IFRAME */
    var inlines = document.querySelectorAll('.mm-widget');
    // inlines.forEach(element => {
    inlines.forEach(function(element) {
      var quizId = 'quiz-model';
      var url = element.dataset.url;
      var iframe = document.createElement('iframe');
      iframe.src = url;
      iframe.id = quizId;
      iframe.style.cssText = 'padding: 0; border: none; margin: 0 auto; flex-grow: 1; background: url(https://admin.revenuehunt.com/rolling.svg) no-repeat center;';
      element.appendChild(iframe);
      document.getElementById(quizId).onload = function () {
        document.getElementById(quizId).contentWindow.focus();
      };
    });
  };

  var openPopup = function openPopup() {
    var links = document.querySelectorAll('a');
    // links.forEach(element => {
    links.forEach(function(element) {
      if (element.href.match(/\#quiz\-/)) {
        var quizId = element.href.split('#quiz-')[1];
        element.addEventListener('click', function (event) {
          event.preventDefault();
          /* REMOVE ALL IDs FIRST */
          if(document.getElementById(quizId)){
            document.getElementById(quizId).remove();    
          }
          /* THEN RENDER IFRAME */
          startQuiz(quizId, false, 'true');
        });
      }
    });
  };
  var startQuiz = function startQuiz(quizId, resultsId, isPopup) {
    var quizUrl = 'https://script.mirrormate.com/mirrormate_quiz/';
    var modal = document.createElement('div');
    modal.id='main-div';
    modal.style.cssText = "display: block; position: fixed; z-index: 9999999998 !important; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(254,254,254,0.6);";
    var close = document.createElement('span');
    close.id='close-div';
    close.innemmTML = '&times;';
    close.style.cssText = "position: fixed; color: #aaaaaa; width: 24px; height: 24px ; background-size: contain ; margin-top: 15px; background-image: url(https://cdn.shopify.com/s/files/1/0350/5894/1996/files/cross-out.png?v=1602495645); z-index: 9999999998 !important; font-size: 50px; font-weight: bold; right: 25px; top: 5px; cursor: pointer;";

    close.onclick = function () {
      modal.style.display = 'none';
    };
    var iframeUrl = quizUrl + 'public/index.php/quizs?popup=' + isPopup;

    var content = document.createElement('div');
    content.id = quizId;
    content.className = 'mm-widget';
    content.dataset.url = iframeUrl;
    content.style.cssText = "display: flex; background-color: rgba(254,254,254,0.4); margin: 0; padding: 0; height: 100%;";
    content.style['flex-grow'] = 1;
    // content.onload = 'this.contentWindow.focus()';

    window.onclick = function (event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    };

    modal.appendChild(content);
    content.appendChild(close);
    // element.parentNode.insertBefore(modal, element);

    document.getElementsByTagName('body')[0].appendChild(modal);
    popupInline();
  };

  var mmApp = function mmApp() {
    openPopup();
    var hash = window.top.location.hash;

    if (hash.match(/\#quiz\-/)) {
      var qId = hash.split('#quiz-')[1];
      startQuiz(qId, false, 'true');
    }
  };

  mmApp();
 
})();
