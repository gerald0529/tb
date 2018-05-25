<?php if (!defined('THINK_PATH')) exit();?>  
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
       <!--  <h3>Content box</h3> -->
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">Table</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">Forms</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <!--<div class="notification attention png_bg"> <a href="#" class="close"><img src="Public/Admin//resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
             <div> This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross. </div> 
          </div>-->
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox" />
                </th>
                <th>FID</th>
                <th>留言人</th>
                <th>主题</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>留言时间</th>
                <th>操作管理</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
                    <select name="dropdown">
                      <option value="option1">Choose an action...</option>
                      <option value="option2">Edit</option>
                      <option value="option3">Delete</option>
                    </select>
                    <a class="button" href="#">Apply to selected</a> </div>
                  <div class="pagination"> 
                  <?php echo ($Page); ?>
                  </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
           <?php if(is_array($arr)): foreach($arr as $k=>$vo): ?><tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td><?php echo ($vo["fid"]); ?></td>
                <td><?php echo ($vo["people"]); ?></td>
                <td><?php echo ($vo["theme"]); ?></td>
                <td><?php echo ($vo["tel"]); ?></td>
                <td><?php echo ($vo["email"]); ?></td>
                <td><?php echo ($vo["addtime"]); ?></td>
               <!--  <td><?php echo ($vo["verifystate"]); ?></td> -->
                <td>
                  <!-- Icons -->
                  <a href="/tb/index.php/Admin/Feedback/edit/id/<?php echo ($vo["fid"]); ?>" title="Edit"><img src="Public/Admin//resources/images/icons/pencil.png" alt="Edit" />
                  </a> &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="/tb/index.php/Admin/Feedback/delete/id/<?php echo ($vo["fid"]); ?>" title="Delete"><img src="Public/Admin//resources/images/icons/cross.png" alt="Delete" />
                  </a> 
                 <!--  <a href="#" title="Edit Meta"><img src="Public/Admin//resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>  -->
                  </td>
              </tr><?php endforeach; endif; ?>
              
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
        
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->