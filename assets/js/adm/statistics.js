app.controller('statistics',['$scope','daftkung',function ($scope, daftkung) {

  var d = new Date();
  $scope.st1 = [];
  $scope.table_2 = $scope.table_3 = [];

  $scope.init = function init() {
    $scope.st1 = {date:null};
    // BOX SEARCH DATE ST1
    var month = ""+(d.getMonth()+1);  var pad = "00";
    $scope.st1.date = (pad.substring(0, pad.length - month.length) + month)+'-'+d.getFullYear();
    $('input.datepicker').datepicker({
      format: "mm-yyyy",
      startView: 1,
      minViewMode: 1,
      autoclose: true,
      toggleActive: true
    });
    $('#st1-date').datepicker("setDate", new Date(d.getFullYear(),d.getMonth(),01) );
    // END BOX SEARCH DATE ST1
    $scope.load_st1();
    $scope.load_st2();
    $scope.load_st3();
  };

  $scope.load_st1 = function load_st1() {
    if($scope.st1.date != null || $scope.st1.date != ''){
      daftkung.get('./adm/statistics/load_st1',$scope.st1,function (res) {
        $('#chart-st1').highcharts({
          title: { text: res.title },
          subtitle: { text: res.subtitle },
          yAxis: { title: { text: "จำนวน Session" } },
          xAxis: { title: { text: null }, categories: res.xAxis.categories },
          legend: { align: 'center', verticalAlign: 'bottom' },
          colors: ['#1769ff','#c017ff','#ff8417','#464646'],
          tooltip: { valueSuffix: ' คน' },
          plotOptions: { line: { dataLabels: { enabled: true, format: "{y}" }, enableMouseTracking: false } },
          series: res.series,
          credits: {enabled: false},
        });
      });
    }
  };

  $scope.load_st2 = function load_st2() {
    if($scope.st1.date != null || $scope.st1.date != ''){
      daftkung.get('./adm/statistics/load_st2',$scope.st1,function (res) {
        $scope.table_2 = res.table;
        $('#chart-st2').highcharts({
          chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
          title: { text: res.title },
          subtitle: { text: res.subtitle },
          tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
              }
            },
          },
          series: [{
            name: 'Brands',
            colorByPoint: true,
            data: res.series.data
          }],
          credits: {enabled: false}
        });

      });
    }
  };

  $scope.load_st3 = function load_st3() {
    if($scope.st1.date != null || $scope.st1.date != ''){
      daftkung.get('./adm/statistics/load_st3',$scope.st1,function (res) {
        $scope.table_3 = res.table; 
        $('#chart-st3').highcharts({
          chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
          title: { text: res.title },
          subtitle: { text: res.subtitle },
          tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
              }
            },
          },
          series: [{
            name: 'Brands',
            colorByPoint: true,
            data: res.series.data
          }],
          credits: {enabled: false}
        });

      });
    }
  };


}]);
