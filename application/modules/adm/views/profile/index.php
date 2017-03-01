<div ng-controller="profile" ng-init="init();">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
      <h2>Profile - <span ng-bind-html="f_profile.fname + ' ' + f_profile.lname"></span></h2>
      <ol class="breadcrumb">
        <li><a href="./adm/">Home</a></li>
        <li class="active">Profile</li>
        <li class="active"><strong><span ng-bind-html="f_profile.fname + ' ' + f_profile.lname"></span></strong></li>
      </ol>
    </div>
  </div>
  <div class="wrapper wrapper-content">

  </div>
</div>
