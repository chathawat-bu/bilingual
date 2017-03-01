<div ng-controller="contact" id="contact" ng-init="init();">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
      <h2>ข้อมูลการลงทะเบียน</h2>
      <ol class="breadcrumb">
        <li>
          <a href="./adm/">หน้าหลัก</a>
        </li>
        <li class="active">
          <strong>ข้อมูลการลงทะเบียน</strong>
        </li>
      </ol>
    </div>
  </div>
  <div class="wrapper wrapper-content">
    <div class="row">
      <div class="col-sm-12">
        <div class="ibox border-left-right border-bottom">
          <div class="ibox-title">
            <div class="btn-group pull-right m-t-n-xs">
              <button type="button" ng-click="page();" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Refresh</button>
            </div>
            <h5><i class="fa fa-envelope-open-o"></i> ข้อมูลการลงทะเบียน</h5><span class="label label-primary" id="total-contact">0</span>
          </div>
          <div class="ibox-content">
            <div id="view-contact"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal inmodal" id="modal-message">
    <div class="modal-dialog">
      <div class="modal-content animated fadeIn">
        <div class="modal-header">
          <h4 class="modal-title">ดูข้อความ</h4>
        </div>
        <div class="modal-body">
          <p class="no-margins" id="message-data"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
  </div>
