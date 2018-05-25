<?php if (!defined('THINK_PATH')) exit();?>  <!-- Page Head -->
    <h2>Welcome www.865171.cn</h2>
    <p id="page-intro">What would you like to do?</p>
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="/tb/index.php/Admin/Article/add/cid/<?php echo ($_SESSION["cid"]); ?>"><span> <img src="Public/Admin//resources/images/icons/pencil_48.png" alt="icon" /><br />
        添加</span></a></li>
      <li><a class="shortcut-button" href=""><span> <img src="Public/Admin//resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
      <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="Public/Admin//resources/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->


    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
       <!--  <h3>Content box</h3> -->
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">列表</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">搜索</a></li>
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
                <td><a href="/tb/index.php/Admin/Article/edit/cid/<?php echo ($vo["cid"]); ?>/id/<?php echo ($vo["id"]); ?>" ><?php echo ($vo["title"]); ?></a></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["verifystate"]); ?></td>
                <td> <?php echo ($vo["resource"]); ?></td>
                <td><?php echo ($vo["add_time"]); ?></td>
                <td><?php echo ($vo["click"]); ?></td>
                <td><?php echo ($vo["sort"]); ?></td>
                <td>
                  <!-- Icons -->
                  <a href="/tb/index.php/Admin/Article/edit/cid/<?php echo ($vo["cid"]); ?>/id/<?php echo ($vo["id"]); ?>" title="Edit"><img src="Public/Admin//resources/images/icons/pencil.png" alt="Edit"  />
                  </a> &nbsp;&nbsp;&nbsp;&nbsp;
                  <!-- <a href="/tb/index.php/Admin/Article/del/cid/<?php echo ($vo["cid"]); ?>/id/<?php echo ($vo["id"]); ?>" title="Delete"><img src="Public/Admin//resources/images/icons/cross.png" alt="Delete" class="del"/>
                  </a>  -->
                  <a href="javascript:;" title="Delete" class="del9" id="<?php echo ($vo["id"]); ?>">
                  <img src="Public/Admin//resources/images/icons/cross.png" alt="Delete" />
                  </a> 
                  <!-- <a href="#" title="Edit Meta"><img src="Public/Admin//resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>  -->
                  </td>
              </tr><?php endforeach; endif; ?>
              
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
        

        <div class="tab-content default-tab" id="tab2">
          
          <form action="<?php echo ($act); ?>" method="post" enctype="multipart/form-data">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <!-- <label> 关键词搜索(关键词，关键字中间用半角逗号隔开)：</label> -->
            关键字: <input class="text-input small-input" type="text" id="small-input" name="id" value="" placeholder="请输入关键字..."/>
            <input class="text-input" type="button" id="small-input" name="" value="搜索"/>

             <!-- <p>
              显示排序：
              <input class="text-input small-input" type="text" id="small-input" name="sort" value="<?php echo ($arr["sort"]); ?>"/>
            </p> -->
            </fieldset>
            </form>
            </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
     <script type="text/javascript" > 
     
$(".del9").click(function(){
     var id2=$(this).attr("id");
     var father=$(this).parent().parent();
     //alert(vall);
     var url='/tb/index.php/Admin/Article/del';

      $.ajax({
           type:'get',
           url:url,
           data:{
                'id2':id2
           },
           //dataType:"json",
           success:function(json){
            
             if(json=='ok'){
              //循环输出删除；         
              father.remove();            
             }else{
              alert(json);
             }
           }
       })
    }) 

    </script>