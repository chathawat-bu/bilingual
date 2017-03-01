<!DOCTYPE html>
<html ng-app="app">
<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <title><?php echo empty($template['title']) ? NULL : "{$template['title']} - {$this->daftkung->config->website->name}" ?></title>
  <link rel="shortcut icon" href="<?php echo $this->daftkung->config->website->favicon; ?>" type="image/x-icon" >
  <meta name="description" content="<?php echo $this->daftkung->config->website->description; ?>">
  <meta name="keywords" content="<?php echo $this->daftkung->config->website->keywords; ?>">
  <!-- Open Graph data -->
  <meta property="og:url" content="<?php echo current_url(); ?>" />
  <meta property="og:type" content="<?php echo $this->daftkung->config->facebook->type; ?>" />
  <meta property="og:title" content="<?php echo empty($template['title']) ? NULL : "{$template['title']} - {$this->daftkung->config->website->name}" ?>" />
  <meta property="og:description" content="<?php echo $this->daftkung->config->website->description; ?>" />
  <meta property="og:image" content="<?php echo base_url($this->daftkung->config->facebook->coverpage); ?>" />
  <meta property="og:site_name" content="<?php echo $this->daftkung->config->website->name; ?>" />
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="<?php echo $this->daftkung->config->twitter->site; ?>">
  <meta name="twitter:title" content="<?php echo empty($template['title']) ? NULL : "{$template['title']} - {$this->daftkung->config->website->name}" ?>">
  <meta name="twitter:description" content="<?php echo $this->daftkung->config->website->description; ?>">
  <meta name="twitter:creator" content="<?php echo $this->daftkung->config->twitter->creator; ?>">
  <meta name="twitter:image:src" content="<?php echo base_url($this->daftkung->config->twitter->coverpage); ?>">
  <?php foreach ($this->daftkung->config->css as $value) :?>
    <link rel="stylesheet" href="./<?php echo $value; ?>">
  <?php endforeach; ?>
</head>
<body class="fixed-sidebar pace-done">
  <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
            <div class="dropdown profile-element"> <span>
              <img alt="image" class="img-circle" src="./uploads/accounts/64/default.png" style="height: 50px;" />
            </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo "{$this->account_data->account_fname} {$this->account_data->account_lname}"; ?></strong>
              </span> <span class="text-muted text-xs block">Administrator
              </a>
            </div>
            <div class="logo-element">ADM</div>
          </li>
          <li class="<?php echo $this->segment[2] == 'contact' ? "active" : NULL; ?>">
            <a href="./adm/contact/"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">ข้อมูลการติดต่อ</span></a>
          </li>
        </ul>
      </div> 
    </nav>
    <div id="page-wrapper" class="gray-bg">
      <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0);"><i class="fa fa-bars"></i> </a>
          </div>
          <ul class="nav navbar-top-links navbar-right">
            <li>
              <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $this->daftkung->config->website->name; ?></span>
            </li>
            <li>
              <a href="javascript:fn.logout();">
                <i class="fa fa-sign-out"></i> ออกจากระบบ
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <?php echo $template['body'] ?>
      <div class="footer fixed">
        <strong>Copyright</strong> <?php echo $this->daftkung->config->website->name; ?> &copy; <?php echo date('Y'); ?>
      </div>
    </div>
  </div>
  <?php foreach ($this->daftkung->config->javascript as $value) :?>
    <script src="./<?php echo $value; ?>" charset="utf-8"></script>
  <?php endforeach; ?>
</body>
</html>
