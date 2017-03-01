<?php if($contacts->num_rows() == 0): ?>
  <div class="jumbotron no-margins p-md text-center no-rounds">
    <h3 class="no-margins">ไม่พบขข้อมูลการลงทะเบียนในระบบค่ะ</h3>
  </div>
<?php else: ?> 
  <table class="table table-striped table-bordered no-margins">
    <thead>
      <tr>
        <th style="width: 50px;" class="text-center">#</th>
        <th>ชื่อ - นามสกุล</th>
        <th style="width: 150px;">โทรศัพท์</th>
        <th class="col-xs-2">อีเมล์</th>
        <th>คณะที่สนใจ</th>
        <th style="width: 50px;" class="text-center"><i class="fa fa-trash"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($contacts->result() as $key => $value):?>
        <tr>
          <td class="text-center font-bold text-info veral-middle"><?php echo $num_order++; ?></td>
          <td class="veral-middle"><?php echo $value->reg_fullname; ?></td>
          <td class="veral-middle"><?php echo $value->reg_mobile; ?></td>
          <td class="veral-middle"><?php echo $value->reg_email; ?></td>
          <td class="veral-middle"><?php echo $value->courses_name; ?></td>
          <td class="veral-middle"><button type="button" class="btn btn-sm btn-danger" onclick="$('#contact').scope().action_delete(<?php echo $value->reg_id; ?>);"><i class="fa fa-trash"></i></button></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php if(!empty($pagination)): ?>
    <div class="row m-t-xs">
      <div class="col-xs-12 text-center">
        <?php echo $pagination; ?>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function () { $('.pagination li a').attr('href', 'javascript:;'); $('[data-toggle="tooltip"]').tooltip(); });
    $('.pagination li a').click(function () {
      var cur_page = $(this).attr('data-ci-pagination-page');
      if (cur_page) { $('#contact').scope().page(cur_page); }
    });
    </script>
  <?php endif; ?>
<?php endif; ?>
