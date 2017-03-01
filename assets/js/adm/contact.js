app.controller('contact',['$scope','daftkung',function ($scope, daftkung) {

  $scope.cur_page = null;

  $scope.init = function init() {
    $scope.page(1);
  };

  $scope.page = function page(page) {
    $scope.cur_page = (page == null ? 1 : page);
    $('#view-contact').html(preloading); $('#total-contact').html('0');
    daftkung.get('./adm/contact/page/'+$scope.cur_page,[],function (res) {
      $('#view-contact').html(res.html); $('#total-contact').html(res.total);
      console.log(res);
    });
  };

  $scope.modal_message = function modal_message(message) {
    $('#message-data').html(message);
    $('#modal-message').modal();
  };

  $scope.action_delete = function action_delete(id) {
    swal({
      title: 'คุณต้องการลบข้อมูลนี้ใช่ไหม?',
      text: null,
      cancelButtonColor: "#d1d1d1",
      confirmButtonColor: "#00ab89",
      type: 'warning',
      showCancelButton: true,
    }, function () {
      daftkung.post('./adm/contact/action_delete',{ id : id}, function (res) {
        fn.success("ลบข้อมูลสำเร็จค่ะ");
        $scope.page($scope.cur_page);
      });
    });
  };



}]);
