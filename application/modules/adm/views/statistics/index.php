<div ng-controller="statistics" id="statistics" ng-init="init();">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
      <h2>ข้อมูลสถิติ</h2>
      <ol class="breadcrumb">
        <li>
          <a href="./adm/">หน้าหลัก</a>
        </li>
        <li class="active">
          <strong>ข้อมูลสถิติ</strong>
        </li>
      </ol>
    </div>
  </div>
  <div class="wrapper wrapper-content">
    <div class="row">
      <div class="col-sm-12">
        <div class="ibox border-left-right border-bottom">
          <div class="ibox-title">
            <div class="row">
              <div class="col-sm-9">
                <h5 style="margin-top: 3px;"><i class="fa fa-bar-chart"></i> ข้อมูลสถิติการเข้าเว็บชมเว็บไซต์</h5>
              </div>
              <div class="col-sm-3">
                <div class="input-group m-t-n-xs">
                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control datepicker text-center" ng-model="st1.date" id="st1-date" ng-change="load_st1();load_st2();load_st3();">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ng-click="load_st1();load_st2();load_st3();"><i class="fa fa-refresh"></i> Refresh</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="ibox-content">
            <div id="chart-st1"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="ibox border-left-right border-bottom">
          <div class="ibox-title">
            <div class="row">
              <div class="col-sm-12">
                <h5 style="margin-top: 3px;"><i class="fa fa-pie-chart"></i> ข้อมูลสถิติการเข้าชมวิดีโอ</h5>
              </div>
            </div>
          </div>
          <div class="ibox-content">
            <div id="chart-st2"></div>
          </div>
          <div class="ibox-content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th>ชื่อวิดีโอ</th>
                  <th class="text-center" style="width: 100px;">Session</th>
                  <th class="text-center" style="width: 100px;">จำนวนคลิก</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="d in table_2.data track by $index">
                  <td class="text-center font-bold text-info">{{$index+1}}</td>
                  <td>{{d.name}}</td>
                  <td class="text-center">{{d.session}}</td>
                  <td class="text-center">{{d.click}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="ibox border-left-right border-bottom">
          <div class="ibox-title">
            <div class="row">
              <div class="col-sm-12">
                <h5 style="margin-top: 3px;"><i class="fa fa-pie-chart"></i> ข้อมูลสถิติการเข้าดูข้อมูลสาขาวิชา</h5>
              </div>
            </div>
          </div>
          <div class="ibox-content">
            <div id="chart-st3"></div>
          </div>
          <div class="ibox-content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th>ชื่อวิดีโอ</th>
                  <th class="text-center" style="width: 100px;">Session</th>
                  <th class="text-center" style="width: 100px;">จำนวนคลิก</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="d in table_3.data track by $index">
                  <td class="text-center font-bold text-info">{{$index+1}}</td>
                  <td>{{d.name}}</td>
                  <td class="text-center">{{d.session}}</td>
                  <td class="text-center">{{d.click}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
