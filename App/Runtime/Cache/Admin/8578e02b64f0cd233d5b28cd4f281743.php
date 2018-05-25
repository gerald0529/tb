<?php if (!defined('THINK_PATH')) exit();?>  <link rel="stylesheet" href="Public/Admin//kindeditor/themes/default/default.css" />
  <script charset="utf-8" src="Public/Admin//kindeditor/kindeditor-min.js"></script>
  <script charset="utf-8" src="Public/Admin//kindeditor/zh_CN.js"></script>
   
    <!-- Page Head -->
    <!-- <h2>Welcome www.865171.cn</h2>
    <p id="page-intro">What would you like to do?</p> -->
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo U('add');?>"><span> <img src="Public/Admin//resources/images/icons/pencil_48.png" alt="icon" /><br />
        添加</span></a></li>
     <!--  <li><a class="shortcut-button" href="<?php echo U('add');?>"><span> <img src="Public/Admin//resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
      <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="Public/Admin//resources/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li> -->
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
     
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <!-- <h3>Content box</h3> -->
        <h3><a href="<?php echo U('index');?>">返回上一页</a></h3> 
        <ul class="content-box-tabs">
          <li><a href="#tab1" >Table</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2" class="default-tab">Forms</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        
          <!-- This is the target div. id must match the href of this div's tab -->
         
        <!-- End #tab1 -->
        <div class="tab-content default-tab" id="tab2">
          
          <form action="<?php echo ($act); ?>" method="post" enctype="multipart/form-data">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <input class="text-input small-input" type="hidden" id="small-input" name="id" value="<?php echo ($arr["id"]); ?>"/>
             <input class="text-input small-input" type="hidden" id="small-input" name="addtime" value="<?php echo ($arr["addtime"]); ?>"/>
            <!-- <input class="text-input small-input" type="hidden" id="small-input" name="user_uid" value="<?php echo ($arr["user_uid"]); ?>"/> -->
            <p>
             <label>商品信息（有<font color=red>*</font>为必填或必选）</label>
             </p>
             
            
            <p>  
              <font color=red>*</font>标题：
              <input class="text-input small-input" type="text" id="small-input" name="title" value="<?php echo ($arr["title"]); ?>"/>
            </p>
           
            <p>
              上传图片：
              <font color="red">(注：①若不选择分类项，则默认为不成缩略图)</font>
              </label>
             <!--  <div style="width:800px; height:600px; border:1px solid #999;"> </div> -->
              <div id="t">分类:   
              
              <input class="text-input small-input" type="file" id="small-input" name="image" value=""/>  
              <br>
              
              <?php if(!empty($arr['pic'])):?>
              <br>   
              <img src="http://localhost/tb//<?php echo ($arr["pic"]); ?>">
              <?php endif;?>  
              <!-- 旧图 -->
              <input class="text-input small-input" type="hidden" id="small-input" name="image2" value="<?php echo ($arr["pic"]); ?>"/>

            <p>
              <label>详情描述</label>
              <textarea name="body" style="width:100%;height:400px;visibility:hidden;"><?php echo ($arr["body"]); ?></textarea> 
            </p>
            </p>
              <input class="button" type="submit" value="Submit" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <script>
      var editor;
      KindEditor.ready(function(K) {
        editor = K.create('textarea[name="body"]', {
          allowFileManager : true
        });

      });
    </script>