var btnActionInsert = $('#btn-actin-insert').ladda();
app.controller('department',['$scope','daftkung',function ($scope,daftkung) {

  $scope.f_form = [];

  $scope.init = function init() {
    $scope.f_form = { fullname:null, email:null, tel:null, message:null}
  };

  $scope.action_insert = function action_insert() {
    btnActionInsert.ladda('start');
    daftkung.post('./home/action_insert_contact_message',$scope.f_form,function (res) {
      if(res.status === true){
        fn.success(res.message);
        fbq('track', 'RegisterContactUsMessage', $scope.f_form);
        $scope.f_form = { fullname:null, email:null, tel:null, message:null}
      }else{
        fn.error(res.message);
      }
      btnActionInsert.ladda('stop');
    });
  };
}]);

var gent_slide_portfolio = function gent_slide_portfolio() {
  $("#header-image").backstretch(image_header,[]);
  $("#sec3").backstretch(header_sec3, {centeredY : false});
  console.log(header_sec3);
  var $width = $(window).width();
  if($width > 700){
    var $slidesToShow = 2;
    var $centerMode = false;
    if(portfolio_total < 2 ){
      $slidesToShow = 1; $centerMode = true;
    }
    $('.fieldset-portfolio-data').slick({
      infinite: true,
      slidesToShow: $slidesToShow,
      slidesToScroll: $slidesToShow,
      variableWidth: true,
      centerMode: $centerMode,
      prevArrow:"<img class='a-left control-c prev slick-prev' src='./assets/images/icon-fa-angle-left.png' style='width: 40px;height: 40px;'>",
      nextArrow:"<img class='a-right control-c next slick-next' src='./assets/images/icon-fa-angle-right.png' style='width: 40px;height: 40px;'>"
    });
    $('.fieldset-video-data').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow:"<img class='a-left control-c prev slick-prev' src='./assets/images/icon-fa-angle-left.png' style='width: 40px;height: 40px;'>",
      nextArrow:"<img class='a-right control-c next slick-next' src='./assets/images/icon-fa-angle-right.png' style='width: 40px;height: 40px;'>"
    });
  } else {
    var $item_width = $('.box-portfolio').width();
    var $width_portfolio = $('.fieldset-portfolio').width();
    $('.fieldset-portfolio-data').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
      dots: true,
      autoplay: true,
      autoplaySpeed: 1500,
      prevArrow:"<img class='a-left control-c prev slick-prev' src='./assets/images/icon-fa-angle-left.png' style='width: 40px;height: 40px;'>",
      nextArrow:"<img class='a-right control-c next slick-next' src='./assets/images/icon-fa-angle-right.png' style='width: 40px;height: 40px;'>"
    });
    $('.fieldset-video-data').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow:"<img class='a-left control-c prev slick-prev' src='./assets/images/icon-fa-angle-left.png' style='width: 40px;height: 40px;'>",
      nextArrow:"<img class='a-right control-c next slick-next' src='./assets/images/icon-fa-angle-right.png' style='width: 40px;height: 40px;'>"
    });
  }
  $('#gallery-set').owlCarousel({
    loop:true,
    margin:10,
    items:1,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true
  });
}
var check_resize_gallery = function check_resize_gallery() {
  $('.img-gallery').css('height','auto');
  var $gheight = $('.img-gallery').height();
  $('.img-gallery').css('height',$gheight);
}

$(document).ready(function () {
  gent_slide_portfolio();
  setTimeout(function(){ check_resize_gallery(); }, 2000);
  setInterval(function(){ check_resize_gallery(); }, 2000);
});
$(window).resize(function () {
  gent_slide_portfolio();
  check_resize_gallery();
});
