<div class="middle-box text-center loginscreen animated fadeInDown" ng-controller="login" ng-init="init();">
  <div>
    <div>
      <h1 class="logo-name"><img src="./<?php echo $this->daftkung->config->website->logo; ?>" alt="<?php echo $this->daftkung->config->website->name; ?>" class="img-responsive"></h1>
    </div>
    <h3 style="line-height: 1.6em;"><?php echo $this->daftkung->config->website->name; ?></h3>
    <form class="m-t" ng-submit="action_login();" autocomplete="off">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="ชื่อเข้าใช้งาน หรืออีเมล์" ng-model="form_login.username" maxlength="30" autofocus="">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="รหัสผ่าน" ng-model="form_login.password">
      </div>
      <button type="submit" id="btn-action-insert" class="ladda-button btn btn-primary block full-width m-b" data-style="zoom-in" >เข้าสู่ระบบ</button>
    </form> 
    <p class="m-t"> <small><?php echo $this->daftkung->config->website->name; ?> &copy; <?php echo date("Y") ?></small> </p>
  </div>
</div>
