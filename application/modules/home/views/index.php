<div ng-controller="home" id="home" ng-init="start();">
  <div class="box-hs-register" ng-click="toggle_show_register();">
    รับข้อมูลเพิ่มเติม
  </div>
  <div id="header-box-1">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-xs-4" id="header-logo">
          <img id="logo" src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/logo.png'); ?>" alt="BILINGUAL PROGRAM - Bangkok University" class="img-responsive" />
        </div>
        <div class="col-sm-6 col-xs-8">
          <div class="phone-number text-center">
            <img class="phone-icon" src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/icon-phone.png'); ?>" />
            02 2495 1326
          </div>
          <div class="text-center m-b-md">
            <h4 class="text-white m-xs h-daily">ทุกวัน 09.00 น. - 17.00 น.</h4>
            <h4 class="text-white m-xs h-daily">(จันทร์ - ศุกร์ ก่อนเวลา 17:00 น.)</h4>
          </div>
          <div class="box-register hidden-xs">
            <div class="btn-close" ng-click="toggle_show_register();">
              <i class="fa fa-times"></i>
            </div>
            <form ng-submit="action_register();">
              <div class="text-center m-b-md">
                <h4 class="no-margins">รับข้อมูลเพิ่มเติม</h4>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="txt-name" placeholder="ชื่อ - สกุล" ng-model="f_reg.name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="txt-mobile" placeholder="เบอร์โทรศัพท์" ng-model="f_reg.mobile">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="txt-email" placeholder="อีเมล" ng-model="f_reg.email">
              </div>
              <div class="form-group">
                <select class="form-control" ng-model="f_reg.courses" ng-options="c.id as c.name for c in courses">
                  <option value="">-- คณะ --</option>
                </select>
              </div>
              <div class="btn-group btn-group-justified m-t-lg">
                <div class="btn-group">
                  <button type="submit" data-style="zoom-in" class="ladda-button btn-action-register btn btn-lg btn-yellow-green">ส่งข้อมูล</button>
                </div>
              </div>
              <div class="text-center m-t-sm text-muted">
                <small>ป้อนข้อมูลเพื่อขอรับรายละเอียดเพิ่มเติม</small>
              </div>
            </form>
          </div>
        </div>
        <div class="col-xs-12 visible-xs">
          <div class="box-register">
            <form ng-submit="action_register();">
              <div class="text-center m-b-md">
                <h4 class="no-margins">รับข้อมูลเพิ่มเติม</h4>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="txt-name" placeholder="ชื่อ - สกุล" ng-model="f_reg.name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="txt-mobile" placeholder="เบอร์โทรศัพท์" ng-model="f_reg.mobile">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="txt-email" placeholder="อีเมล์" ng-model="f_reg.email">
              </div>
              <div class="form-group">
                <select class="form-control" ng-model="f_reg.courses" ng-options="c.id as c.name for c in courses">
                  <option value="">-- คณะ --</option>
                </select>
              </div>
              <div class="btn-group btn-group-justified m-t-lg">
                <div class="btn-group">
                  <button type="submit" data-style="zoom-in" class="ladda-button btn-action-register btn btn-lg btn-yellow-green">ส่งข้อมูล</button>
                </div>
              </div>
              <div class="text-center m-t-sm text-muted">
                <small>ป้อนข้อมูลเพื่อขอรับรายละเอียดเพิ่มเติม</small>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="header-box-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-5 hidden-xs">
          <img id="people" src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/people.png'); ?>" alt="" />
        </div>
        <div class="col-sm-7">
          <div class="m-t-md">
            <br class=" hidden-xs" /><br class="hidden-sm hidden-xs" />
            <div class="text-center m-t-lg m-b-lg">
              <h2 class="text-white">หลักสูตร 2 ภาษา</h2>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-6">
                <a href="<?php echo "./faculty/accounting"; ?>">
                  <div class="box-program">
                    <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/icon-account.png'); ?>" class="icon" />
                    <span class="name">คณะบัญชี</span>
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-xs-6">
                <a href="<?php echo "./faculty/communication-arts"; ?>">
                  <div class="box-program">
                    <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/icon-camera.png'); ?>" class="icon" />
                    <span class="name">คณะนิเทศศาสตร์</span>
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-xs-6">
                <a href="<?php echo "./faculty/business-administration"; ?>">
                  <div class="box-program">
                    <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/icon-bussiness.png'); ?>" class="icon" />
                    <span class="name">คณะบริหารธุรกิจ</span>
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-xs-6">
                <a href="<?php echo "./faculty/humanities-and-tourism-management"; ?>">
                  <div class="box-program">
                    <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/icon-people.png'); ?>" class="icon" />
                    <span class="name">คณะมนุษยศาสตร์</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="box-3">
    <div class="top"></div>
    <div class="body">
      <div class="container">
        <div class="row m-b-md">
          <div class="col-xs-12">
            <h1 class="text-yellow-green m-b-md lh-sm">คำตอบของอนาคตที่เหนือกว่าในระดับสากล</h1>
            <p class="lh-md">
              &emsp;&emsp;ปฏิเสธไม่ได้เลยว่าทุกวันนี้ภาษาอังกฤษมีบทบาทสำคัญในวิถีชีวิตของคนยุคใหม่ ภาษาอังกฤษจึงไม่ใช่แค่เรื่องทักษะ แต่เป็นกุญแจสำคัญที่ใช้สื่อสารกับคนทั่วโลก ให้คุณค้นพบโอกาสที่มากกว่าและตอบโจทย์อนาคตด้วยทางเลือกใหม่ ด้วยการเรียนรู้ที่มากกว่า สร้างความได้เปรียบกว่า กับหลักสูตรสองภาษาหรือ Bilingual Program ไม่ว่าจะมีพื้นฐานแบบไหนก็เรียนได้ และไม่ต้องกังวลหากยังไม่พร้อมเรียนหลักสูตรที่ใช้ภาษาอังกฤษแบบ 100% มหาวิทยาลัยกรุงเทพได้ปฏิวัติการเรียนการสอนแบบใหม่ ที่ทำให้การเรียนภาษาอังกฤษเป็นเรื่องสนุกและไม่ยากอย่างที่คิด เพราะเราได้ออกแบบการเรียนรู้ให้มีการปรับพื้นฐานและเพิ่มพูนทักษะการใช้ภาษาอังกฤษอย่างค่อยเป็นค่อยไปแบบเป็นขั้นตอน ให้นักศึกษาได้พัฒนาภาษาอังกฤษควบคู่กับการเรียนหลัก โดยมีคณาจารย์และวิทยากรมืออาชีพชั้นนำ ทั้งชาวไทยและต่างชาติที่เข้าใจและพร้อมให้การดูแลใส่ใจนักศึกษาอย่างใกล้ชิด บ่มเพาะให้นักศึกษามีความสามารถและความเชี่ยวชาญทั้งด้านวิชาชีพและภาษาอังกฤษ เพื่อนำไปประยุกต์ใช้ในด้านธุรกิจได้อย่างมั่นใจ เรายังเน้นให้นักศึกษามีโลกทัศน์และประสบการณ์นอกเหนือจากในห้องเรียน โดยจัดโครงการศึกษาดูงานที่ต่างประเทศ ทั้งทริปเอเชียและยุโรป รวมครบอยู่ในค่าเรียนทั้งหมดเรียบร้อย ไม่มีค่าใช้จ่ายเพิ่มเติม!!
              <br /><br />
              <strong style="color: #333;">สร้างโอกาสที่เปิดกว้างให้คุณได้เลือกเรียนตามความถนัด กับ 6 หลักสูตรใหม่ที่อัดแน่นด้วยคุณภาพ ดังนี้</strong>
              <br />
              <div class="row m-t-md">
                <div class="col-sm-6">
                  <strong style="color: #333;">คณะนิเทศศาสตร์</strong>
                  <ul class="list-unstyled list-faculty m-t-sm m-l-md">
                    <li class="m-b-sm"><a href="./faculty/communication-arts">- สาขาวิชาการโฆษณา (Advertising)</a></li>
                    <li><a href="./faculty/communication-arts">- สาขาวิชาวิทยุกระจายเสียงและวิทยุโทรทัศน์ (Broadcasting)</a></li>
                  </ul>
                  <br />
                  <strong style="color: #333;">คณะบัญชี</strong>
                  <ul class="list-unstyled list-faculty m-t-sm m-l-md">
                    <li><a href="./faculty/accounting">- บัญชี (Accounting)</a></li>
                  </ul>
                  <br class="visible-xs" />
                </div>
                <div class="col-sm-6">
                  <strong style="color: #333;">คณะบริหารธุรกิจ</strong>
                  <ul class="list-unstyled list-faculty m-t-sm m-l-md">
                    <li class="m-b-sm"><a href="./faculty/business-administration">- สาขาวิชาการตลาด (Marketing)</a></li>
                    <li><a href="./faculty/business-administration">- สาขาวิชาการจัดการธุรกิจระหว่างประเทศ (International Business Management)</a></li>
                  </ul>
                  <br />
                  <strong style="color: #333;">คณะมนุษยศาสตร์และการจัดการการท่องเที่ยว</strong>
                  <ul class="list-unstyled list-faculty m-t-sm m-l-md">
                    <li><a href="./faculty/humanities-and-tourism-management">- สาขาวิชาการจัดการธุรกิจสายการบิน (Airline Business Management)</a></li>
                  </ul>
                </div>
              </div>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 m-b-md">
            <iframe width="100%" height="335" src="https://www.youtube.com/embed/WcyIKoT9cs8" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-sm-6 m-b-md">
            <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/header-experience.png'); ?>" class="img-responsive"/>
            <div class="row m-t-md">
              <div class="col-xs-6 text-center">
                <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/exp-people-1.png'); ?>" class="img-circle img-thumbnail box-exp-people m-b-md" />
                <p class="lh-md">
                  น้องเมย์คณะนิเทศศาสตร์<br />
                  กับประสบการณ์ที่ได้จากการเรียน
                </p>
              </div>
              <div class="col-xs-6 m-b-md text-center">
                <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/exp-people-2.png'); ?>" class="img-circle img-thumbnail box-exp-people m-b-md" />
                <p class="lh-md">
                  น้องภูมิคณะมนุยศาสตร์<br />
                  กับประสบการณ์ที่ได้จากการเรียน
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 m-b-md">
            <table class="table table-striped table-bordered">
              <thead>
                <tr style="background-color: #c0c710;color: #FFF;">
                  <th class="text-center hidden-xs" style="width: 80px;vertical-align: middle;">รหัส</th>
                  <th class="text-center" style="vertical-align: middle;">คณะ</th>
                  <th class="text-center" style="width: 130px;">ค่าเล่าเรียน / เทอม<br />(เหมาจ่าย)</th>
                </tr>
              </thead>
              <?php
              $data = array(
                array('B010','บัญชี',87000),
                array('B022','การตลาด',87000),
                array('B027','การจัดการธุรกิจระหว่างประเทศ',87000),
                array('B034','การโฆษณา',87000),
                array('B036','วิทยุกระจายเสียงและวิทยุโทรทัศน์',87000),
                array('B053','การจัดการธุรกิจสายการบิน',87000),
              );
              ?>
              <tbody>
                <?php foreach ($data as $key => $value):?>
                  <tr>
                    <td class="text-center hidden-xs"><?php echo $value[0]; ?></td>
                    <td><?php echo $value[1]; ?></td>
                    <td class="text-center"><?php echo number_format($value[2]); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="col-sm-6 m-b-md">
            <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/img-grid-4.png'); ?>" alt="" style="width: 100%;"/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="text-dark">รับข้อมูลเพิ่มเติม</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="box-information-bottom">
    <div class="container">
      <div class="col-xs-12 col-md-offset-1 col-md-10">
        <div class="panel panel-default no-rounds no-margins  no-borders">
          <div class="panel-body p-md">
            <div class="row">
              <div class="col-sm-6">
                <div class="text-center m-t-sm">
                  <img src="<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/logo-contact.png'); ?>" height="80" />
                  <p class="m-t-sm lh-md">
                    มหาวิทยาลัยกรุงเทพ วิทยาเขตรังสิต<br />
                    ที่อยู่เลขที่ 9/1 หมู่ 5 ถนนพหลโยธิน ต.คลองหนึ่ง<br />อ.คลองหลวง ปทุมธานี 12120<br />
                    โทร <a href="tel:029020250">0 2902 0250-99</a><br />
                    แฟกซ์ <a href="fax:025168553">0 2516 8553</a><br />
                    อีเมล <a href="mailto:info@bu.ac.th">info@bu.ac.th</a><br />
                    รับสมัครนักศึกษา 0 2902 0299 (ต่อ 2411-2417)
                  </p>
                  <br class="visible-xs" />
                </div>
              </div>
              <div class="col-sm-6">
                <form ng-submit="action_register();">
                  <div class="text-center m-b-md">
                    <h4 class="no-margins">รับข้อมูลเพิ่มเติม</h4>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="txt-name" placeholder="ชื่อ - สกุล" ng-model="f_reg.name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="txt-mobile" placeholder="เบอร์โทรศัพท์" ng-model="f_reg.mobile">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="txt-email" placeholder="อีเมล" ng-model="f_reg.email">
                  </div>
                  <div class="form-group">
                    <select class="form-control" ng-model="f_reg.courses" ng-options="c.id as c.name for c in courses">
                      <option value="">-- คณะ --</option>
                    </select>
                  </div>
                  <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                      <button type="submit" data-style="zoom-in" class="ladda-button btn-action-register btn btn-dark">ส่งข้อมูล</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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
var bg_base64 = "<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/bg.png'); ?>";
var bg_bottom_base64 = "<?php echo $this->daftkung->imageToBase64('themes/home/assets/images/bg-map.png'); ?>";
</script>
