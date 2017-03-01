var btnActionInsert = $("#btn-action-insert").ladda();
app.controller('login',['$scope','daftkung',function ($scope, daftkung) {

  $scope.form_login;

  $scope.init = function init() {
    $scope.form_login = {"username":null, "password":null};
  };

  $scope.action_login = function action_login() {
    btnActionInsert.ladda('start');
    daftkung.post('./adm/auth/login/action_login',$scope.form_login,function (res) {
      if(res.status === false){
        fn.error(res.message);
        $scope.form_login.password = null;
      }else{
        window.location.reload();
      }
      setTimeout(function(){ btnActionInsert.ladda('stop'); },500);
    });
  };

}]);
