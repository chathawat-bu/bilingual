<div ng-controller="faculty" id="faculty">
  <div id="header">
    <a href="./"><img class="logo" src="<?php echo $this->daftkung->imageToBase64("themes/home/assets/images/logo.png"); ?>" alt=""></a>
    <div class="btn-register">
      <a href="http://www.bu.ac.th/apply" target="_blank"><h2>สมัครออนไลน์</h2></a>
    </div>
    <div class="box-contact">
      <ul class="list-inline">
        <li class="icon-phone-rss"><img src="<?php echo $this->daftkung->imageToBase64("assets/images/icon-phone-rss.png"); ?>" alt=""></li>
        <li class="m-t-n-xs">
          <h2 class="no-margins">02 2495 1326</h2>
          ทุกวัน 09.00 น. - 17.00 น.<br />(จันทร์ - ศุกร์ ก่อนเวลา 17:00 น.)
        </li>
      </ul>
    </div>
  </div>
  <div id="header-image">
    <img src="<?php echo $this->daftkung->imageToBase64($data->header_image); ?>" alt="">
  </div>
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="form-inline">
            <select class="form-control pull-right" onchange="window.location = $(this).val();">
              <?php foreach ($faculty->faculty as $key => $value): ?>
                <option value="./faculty/<?php echo $value->link ?>" <?php echo ($value->link == $this->segment[2]) ? "selected" : NULL; ?>><?php echo $value->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row m-t-md">
        <div class="col-sm-4 col-md-4 text-center">
          <img src="<?php echo $this->daftkung->imageToBase64($data->circle_image); ?>" class="faculty-circle visible-xs" alt="<?php echo $data->name; ?>">
          <img src="<?php echo $this->daftkung->imageToBase64($data->circle_image); ?>" class="img-circle faculty-circle hidden-xs" alt="<?php echo $data->name; ?>">
        </div>
        <div class="col-sm-8 col-md-8">
          <h2 class="text-dark m-b-md"><?php echo $data->name; ?></h2>
          <p style="line-height: 1.8em;"><?php echo $data->description; ?></p>
        </div>
      </div>
      <!-- <div class="row m-t-md">
        <div class="col-xs-12">
          <h2 class="text-gold"><span class="text-dash">-----------------------</span>&emsp;สาขาวิชา<span class="hidden-xs"><?php echo $data->name; ?></span></h2>
        </div>
      </div> -->
      <?php foreach ($data->department as $key => $value): ?>
        <div class="row m-t-md">
          <div class="col-sm-12 col-md-6">
            <div class="panel panel-default no-rounds no-borders no-shadows">
              <div class="panel-body p-lg">
                <h3 class="text-gold no-margins" style="line-height: 1.5em;"><img src="<?php echo $this->daftkung->imageToBase64("assets/images/icon-check.png"); ?>" style="height: 25px;" class="m-t-n-xs">&nbsp;&nbsp;&nbsp;<?php echo $value->name; ?></h3>
                <p style="line-height: 1.8em;"><?php echo $value->description; ?></p>
                <br />
                <h3 class="text-dark no-margins"><img src="<?php echo $this->daftkung->imageToBase64("assets/images/icon-check.png"); ?>" style="height: 25px;" class="m-t-n-xs">&nbsp;&nbsp;&nbsp;โอกาสทางอาชีพ</h3>
                <p style="line-height: 1.8em;"><?php echo $value->career_opportunities; ?></p>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <fieldset>
              <legend><span class="visible-xs">&emsp;</span>รายละเอียดสาขา<span class="visible-xs">&emsp;</span></legend>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">ชื่อคณะ</div>
                <div class="col-sm-9"><?php echo $data->name; ?></div>
              </div>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">ชื่อสาขา</div>
                <div class="col-sm-9"><?php echo $value->name; ?></div>
              </div>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">ชื่อปริญญา</div>
                <div class="col-sm-9"><?php echo $value->degree; ?></div>
              </div>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">คุณสมบัติ</div>
                <div class="col-sm-9"><?php echo $value->property; ?></div>
              </div>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">แผนการศึกษา</div>
                <div class="col-sm-9">รายละเอียดหลักสูตร&emsp;<a href="<?php echo $value->plan; ?>" target="_blank"><i class="fa fa-hand-o-right"></i> คลิกที่นี่</a></div>
              </div>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">ค่าเทอม</div>
                <div class="col-sm-9"><?php echo $value->tuition_fee; ?></div>
              </div>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">เวลาการศึกษา</div>
                <div class="col-sm-9"><?php echo $value->study_period; ?></div>
              </div>
              <div class="row m-b-sm">
                <div class="col-sm-3 text-dark">ทุนการศึกษา</div>
                <div class="col-sm-9"><?php echo $value->scholarship; ?></div>
              </div>
              <!-- <div class="row m-b-sm m-t-md">
                <div class="col-xs-12">
                  <a href="<?php echo $value->link_other; ?>" class="pull-right text-green-yellow" target="_blank"><i class="fa fa-angle-double-right"></i> ดูรายละเอียดเพิ่มเติม</a>
                </div>
              </div> -->
            </fieldset> 
          </div>
        </div>
      <?php endforeach; ?>
      <div class="row">
        <div class="col-xs-12 text-center">
          <br /><br />
          <a href="http://www.bu.ac.th/apply" target="_blank" class="btn btn-lg btn-dark">&emsp;&emsp;สมัครออนไลน์&emsp;&emsp;</a>
          <br /><br />
        </div>
      </div>
    </div>
  </div>
  <div id="gallery">
    <?php foreach ($gallery as $key => $value): ?>
      <a href="<?php echo $this->daftkung->imageToBase64("uploads/gallery/{$value}"); ?>" data-gallery="">
        <img src="<?php echo $this->daftkung->imageToBase64("uploads/gallery/tmp/{$value}"); ?>" alt="">
      </a>
    <?php endforeach; ?>
    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
    <div id="blueimp-gallery"  class="blueimp-gallery blueimp-gallery-controls">
      <div class="slides"></div>
      <h3 class="title"></h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
      <a class="play-pause"></a>
      <ol class="indicator"></ol>
    </div>

  </div>
  <footer id="footer" class="text-white text-center">
    <div class="m-b-sm">
      <a href="tel:029020250" class="btn btn-sm btn-white btn-round">กดโทรอัตโนมัติ</a>
    </div>
    <ul class="list-inline no-margins">
      <li><a href="https://www.facebook.com/bangkokuniversity" target="_blank"><img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/socail-facebook.png'); ?>" height="25" /></a></li>
      <li><a href="https://twitter.com/Bangkok_BU" target="_blank"><img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/socail-twitter.png'); ?>" height="25" /></a></li>
    </ul>
    <p class="no-margins">
      <small>Bilingual Program Bangkok University<br />All Rights Reserved. Bangkok University © 2016</small>
    </p>
  </footer>
</div>
<script type="text/javascript">
var header_image = "<?php echo $this->daftkung->imageToBase64($data->header_image); ?>";
</script>
