var app = angular.module('app',['ngSanitize']);
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
    },
  }
}]);
var fn = {
  error: function(text, header){
    header = (header == null ? "Opps..!" : header);
    swal({
      title: header,
      text: text,
      type: "error",
      confirmButtonColor: "#654fa1"
    });
  },
  success: function(text, header, opt, url){
    header = (header == null ? "Successfully!" : header);
    swal({
      title: header,
      text: text,
      type: "success",
      confirmButtonColor: "#654fa1"
    }, function () {
      if (opt == 'reload') {
        window.location.reload();
      } else if (opt == 'go') {
        window.location = url;
      }
    });
  }
};
