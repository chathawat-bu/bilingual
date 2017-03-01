var btnActionInsert = $('#btn-actin-insert').ladda();
app.controller('index',['$scope','daftkung',function ($scope,daftkung) {

  $scope.f_form = [];

  $scope.init = function init() {
    $scope.f_form = { fullname:null, email:null, tel:null}
  };

  $scope.action_insert = function action_insert() {
    btnActionInsert.ladda('start');
    daftkung.post('./home/action_insert_contact',$scope.f_form,function (res) {
      if(res.status === true){
        fn.success(res.message);
        fbq('track', 'RegisterContactUs', $scope.f_form);
        $scope.f_form = { fullname:null, email:null, tel:null}
      }else{
        fn.error(res.message);
      }
      btnActionInsert.ladda('stop');
    });
  };

}]);
var check_box_square = function check_box_square() {
  var $width = $('.box-square:first').width();
  $('.box-square').css('height',$width+'px');
  $("#home-sec1").backstretch(header_sec1, {centeredY : false});
  $("#home-sec2").backstretch(header_sec2, {centeredY : false});
  $("#home-sec3").backstretch(header_sec3, {centeredY : false});
  $('#gallery-set').owlCarousel({ loop:true, margin:10, items:1, autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true });
}
var check_resize_gallery = function check_resize_gallery() {
  $('.img-gallery').css('height','auto');
  var $gheight = $('.img-gallery').height();
  $('.img-gallery').css('height',$gheight);
}
$(document).ready(function () {
  check_box_square();
  setTimeout(function(){ check_resize_gallery(); }, 2000);
  setInterval(function(){ check_resize_gallery(); }, 2000);
});
$(window).resize(function () {
  check_box_square();
  check_resize_gallery();
});
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var vf1, vf2, vf3;
function onYouTubeIframeAPIReady() {
  vf1 = new YT.Player('video-frame-1', {
    height: '390', width: '640', videoId: '7xnGTVa1XeU', events: {  'onStateChange': onPlayerStateChange_1 }
  });
  vf2 = new YT.Player('video-frame-2', {
    height: '390', width: '640', videoId: 'h1j5p159khs', events: { 'onStateChange': onPlayerStateChange_2 }
  });
  vf3 = new YT.Player('video-frame-3', {
    height: '390', width: '640', videoId: 'h1j5p159khs', events: { 'onStateChange': onPlayerStateChange_2 }
  });
}
function onPlayerStateChange_1(event) {
  if(event.data == 1){
    var detail = "มนุษย์ฯ ท่องเที่ยวตะลุยเกาหลี ทัวร์นี้ไม่ตามสูตร!!";
    $.get('./home/action_click_video',{ detail : detail});
    fbq('track', 'ViewVideo', {'name': detail});
  }

  if(event.data == 0){
    var $ww = $(window).width();
    var $height = $(window).height();

    if($ww <= 425){
      $('html, body').animate({ scrollTop: 350 }, 'fast');
      vf3.playVideo();
    }
    else if($ww <= 991){
      // $('html, body').animate({ scrollTop: 350 }, 'fast');
      vf3.playVideo();
    }
    else{
      $('html, body').animate({ scrollTop: 600 }, 'fast');
      vf2.playVideo();
    }

  }
}
function onPlayerStateChange_2(event) {
  if(event.data == 1){
    var detail = "'ทัวร์เกาหลี ทัวร์นี้ไม่ตามสูตร - สาขาการจัดการการท่องเที่ยว ม.กรุงเทพ";
    $.get('./home/action_click_video',{ detail : detail});
    fbq('track', 'ViewVideo', {'name': detail});
  }
}
var action_click_video = function action_click_video(detail) {
  $.get('./home/action_click_video',{ detail : detail});
  fbq('track', 'ViewVideo', {'name': detail});
}
