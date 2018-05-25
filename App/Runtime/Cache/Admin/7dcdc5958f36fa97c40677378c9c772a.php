<?php if (!defined('THINK_PATH')) exit();?> 
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
            <input class="text-input small-input" type="hidden" id="small-input" name="psid" value="<?php echo ($arr["psid"]); ?>"/>
            
            <!-- <input class="text-input small-input" type="hidden" id="small-input" name="user_uid" value="<?php echo ($arr["user_uid"]); ?>"/> -->
            <p>
             <label>商品信息（有<font color=red>*</font>为必填或必选）</label>
             </p>
            
            <p>  
              <font color=red>*</font>位置名称：
              <input class="text-input small-input" type="text" id="small-input" name="position_name" value="<?php echo ($arr["position_name"]); ?>"/>
            </p>
            
            <p>
              长度：
              <input class="text-input small-input" type="text" id="small-input" name="width" value="<?php echo ($arr["width"]); ?>"/>
            </p>
            <p>
              宽度：
              <input class="text-input small-input" type="text" id="small-input" name="height" value="<?php echo ($arr["height"]); ?>"/>
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