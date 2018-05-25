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
                <th>ID</th>
                <th>文章标题</th>
                <th>文章分类</th>
                <th>状态</th>
                <th>发布者</th>
                <th>发布时间</th>
                <th>点击量</th>
                <th>排序</th>
                <th>操作管理</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
                    <select name="dropdown">
                      <option value="option1">选择一种操作...</option>
                      <option value="option2" id="all">全选</option>
                      <option value="option3" id="some">反选</option>
                      <option value="option4" id="none">全不选</option>
                    </select>
                    <a class="button" href="javascript:void(0)">删除</a> </div>
                    </div>
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
                 <!--  <input type="checkbox" /> -->
                  <input type="checkbox" class="tt" value="<?php echo ($vo["id"]); ?>"/>
                </td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><a href="/tb/index.php/Admin/News/edit/id/<?php echo ($vo["id"]); ?>" ><?php echo ($vo["title"]); ?></a></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["verifystate"]); ?></td>
                <td> <?php echo ($vo["resource"]); ?></td>
                <td><?php echo ($vo["add_time"]); ?></td>
                <td><?php echo ($vo["click"]); ?></td>
                <td><?php echo ($vo["sort"]); ?></td>
                <td>
                  <!-- Icons -->
                  <a href="/tb/index.php/Admin/News/edit/id/<?php echo ($vo["id"]); ?>" title="Edit"><img src="Public/Admin//resources/images/icons/pencil.png" alt="Edit" />
                  </a> 
                  <a href="/tb/index.php/Admin/News/delete/id/<?php echo ($vo["id"]); ?>" title="Delete"><img src="Public/Admin//resources/images/icons/cross.png" alt="Delete" />
                  </a> 
                  <!-- <a href="#" title="Edit Meta"><img src="Public/Admin//resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>  -->
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