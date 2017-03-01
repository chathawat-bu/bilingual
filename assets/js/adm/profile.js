app.controller('profile',['$scope','daftkung',function ($scope,daftkung) {

  $scope.f_profile;

  $scope.init = function init() {
    $scope.f_profile = [];
    $scope.get_account();
  };

  $scope.get_account = function get_account() {
    daftkung.get('./adm/get_account',[],function (res) {
      $scope.f_profile = res;
      console.log(res);
    });
  };

}]);
