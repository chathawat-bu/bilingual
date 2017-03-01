var btnActionRegister = $('.btn-action-register').ladda();
app.controller('home',['$scope','daftkung',function ($scope, daftkung) {

  $scope.courses = [];
  $scope.f_reg = {name:null, mobile:null, email:null, courses:null };

  $scope.start = function start() {
    $scope.get_courses();
  };

  $scope.get_courses = function get_courses() {
    daftkung.get('./home/get_courses',[],function (response) { 
      $scope.courses = response;
    });
  };

  $scope.action_register = function action_register() {
    btnActionRegister.ladda('start');
    daftkung.post('./home/action_register',$scope.f_reg,function (response) {
      if(response.status != true){
        fn.error(response.message);
      }else{
        $scope.f_reg = {name:null, mobile:null, email:null, courses:null };
        fn.success(response.message);
        $('.box-register').toggle();
      }
      setTimeout(function(){ btnActionRegister.ladda('stop'); },700)
    });
  };

  $scope.toggle_show_register = function toggle_show_register() {
    $('.box-register').toggle();
  };

}]);

$.backstretch(bg_base64);
$("#box-information-bottom").backstretch(bg_bottom_base64);
