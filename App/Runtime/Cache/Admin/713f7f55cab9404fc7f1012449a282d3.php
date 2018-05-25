<?php if (!defined('THINK_PATH')) exit();?> 
    <!-- Page Head -->
    <h2>Welcome www.865171.cn</h2>
    <p id="page-intro">What would you like to do?</p>
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo U('add');?>"><span> <img src="Public/Admin//resources/images/icons/pencil_48.png" alt="icon" /><br />
        添加</span></a></li>
      <li><a class="shortcut-button" href="<?php echo U('add');?>"><span> <img src="Public/Admin//resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
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
            <input class="text-input small-input" type="hidden" id="small-input" name="uid" value="<?php echo ($arr["uid"]); ?>"/>
            <!-- <input class="text-input small-input" type="hidden" id="small-input" name="resource" value="<?php echo ($_SESSION["user"]); ?>"/> -->
            <p>
             <label>商品信息（有<font color=red>*</font>为必填或必选）</label>
             </p>
             <p>
              <font color=red>*</font>所属会员级：
              <select name="role_id" class="small-input1"    style="width:120px;">
               <option value="0">默认</option> 
                <?php foreach ($abb as $key => $v) :?>
               <option value="<?php echo $v['id']; ?>" <?php if($v['id']==$arr['role_id']) echo "selected";?>>
               <?php echo $v['title']; ?></option>
               <?php endforeach;?>
               </select> 
            </p>
            
            <p>  
              <font color=red>*</font>帐号：
              <input class="text-input small-input" type="text" id="small-input" name="username" value="<?php echo ($arr["username"]); ?>"/>
            </p>
            <p>  
              <font color=red>*</font>密码：
              <input class="text-input small-input" type="password" id="small-input" name="password" value=""/>
            </p>
            <p>  
              <font color=red>*</font>确认密码(未加JS)：
              <input class="text-input small-input" type="password" id="small-input" name="password2" value=""/>
            </p>
             <p>  
              <font color=red>*</font>状态：
              <input  type="radio" id="small-input" name="is_lock" value="0" <?php if($arr['is_lock'] == 0) echo 'checked="checked"';?>/>
              <span>正常</span>
              <input  type="radio" id="small-input" name="is_lock" value="1" <?php if($arr['is_lock'] == 1 ) echo 'checked="checked"';?>/>
              <span>锁定</span>
            </p>
            
            <p>
              上传图片：
              <font color="red">(注：①若不选择分类项，则默认为不成缩略图)</font>
              </label>
             <!--  <div style="width:800px; height:600px; border:1px solid #999;"> </div> -->
              <div id="t">分类:   
              <input type="radio" name="thub" value=1 checked="checked" />缩略图一(500*500) 
              <input type="radio" name="thub" value=2 />缩略图二(200*200)</div><br>
              <input class="text-input small-input" type="file" id="small-input" name="image" value=""/>  
              <br>
              <?php if(!empty($arr['thumb'])):?>
              <br>   
              <img src="http://localhost/tb//<?php echo ($arr["thumb"]); ?>">
              <?php elseif(!empty($arr['image'])):?>
              <br>   
              <img src="http://localhost/tb//<?php echo ($arr["image"]); ?>">
              <?php endif;?>  
              <!-- 旧图 -->
              <input class="text-input small-input" type="hidden" id="small-input" name="image2" value="<?php echo ($arr["image"]); ?>"/>
              <input class="text-input small-input" type="hidden" id="small-input" name="thumb2" value="<?php echo ($arr["thumb"]); ?>"/>

            </p>
            <p>
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