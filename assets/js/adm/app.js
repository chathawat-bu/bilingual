var app = angular.module('app',['ngSanitize']);
var preloading = '<div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div></div>';
var preloadingAdm = '<div class="spiner-example"> <div class="sk-spinner sk-spinner-wave"> <div class="sk-rect1"></div> <div class="sk-rect2"></div> <div class="sk-rect3"></div> <div class="sk-rect4"></div> <div class="sk-rect5"></div> </div> </div>';

app.factory('daftkung',['$http',function ($http) {
  return {
    post: function(url,data,response){
      $http({
        method: "POST",
        url: url,
        headers: { "Content-Type" : 'application/x-www-form-urlencoded'},
        data: $.param(data)
      }).success(response).error(function(e){
        console.error(e);
      });
    },
    get: function(url,data,response){
      $http({
        method: "GET",
        url: url+"?"+$.param(data),
        headers: { "Content-Type" : 'application/x-www-form-urlencoded'},
      }).success(response).error(function(e){
        console.error(e);
      });
    }
  }
}]);
var action_click_register = function action_click_register(detail) {
  $.get('./home/action_click_register',{ detail : detail});
}
var fn = {
  error: function(text, header){
    header = (header == null ? "Opps..!" : header);
    swal({
      title: header,
      text: text,
      type: "error",
      confirmButtonColor: "#00ab89"
    });
  },
  success: function(text, header, opt, url){
    header = (header == null ? "Successfully!" : header);
    swal({
      title: header,
      text: text,
      type: "success",
      confirmButtonColor: "#00ab89"
    }, function () {
      if (opt == 'reload') {
        window.location.reload();
      } else if (opt == 'go') {
        window.location = url;
      }
    });
  },
  logout: function () {
    swal({
      title: "Are you sure?",
      text: "คุณต้องการออกจากระบบใช่ไหม?",
      cancelButtonColor: "#d1d1d1",
      confirmButtonColor: "#00ab89",
      type: 'warning',
      showCancelButton: true,
    }, function () {
      $.get('./adm/logout',function () {
        window.location.reload();
      });
    });
  }
};
$(document).ready(function () {
  $('#overlay').fadeOut(500);
});
