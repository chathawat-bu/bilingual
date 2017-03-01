<!DOCTYPE html>
<html ng-app="app">
<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo empty($template['title']) ? NULL : "{$template['title']} - {$this->daftkung->config->website->name}" ?></title>
  <link rel="shortcut icon" href="<?php echo $this->daftkung->config->website->favicon; ?>" type="image/x-icon" >
  <meta name="description" content="<?php echo $this->daftkung->config->website->description; ?>">
  <meta name="keywords" content="<?php echo $this->daftkung->config->website->keywords; ?>">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="<?php echo $this->daftkung->config->facebook->apikey; ?>" />
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
<body>
  <div id="fb-root"></div>
  <?php echo $template['body']; ?>
  <?php foreach ($this->daftkung->config->javascript as $value) :?>
    <script src="<?php echo $value; ?>" charset="utf-8"></script>
  <?php endforeach; ?>
</body>
</html>
