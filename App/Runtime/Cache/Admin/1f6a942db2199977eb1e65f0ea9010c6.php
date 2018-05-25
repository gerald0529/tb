<?php if (!defined('THINK_PATH')) exit();?>  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
    <!-- Page Head -->
    <h2>Welcome www.865171.cn</h2>
    <p id="page-intro">What would you like to do?</p>
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/pencil_48.png" alt="icon" /><br />
        Write an Article </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
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
        <h3>Content box</h3>
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
          
          <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
             <label>商品信息（有<font color=red>*</font>为必填或必选）</label>
             <p>
              <font color=red>*</font>所属栏目：
              <select name="cid" class="small-input1"    style="width:120px;">
               <option value="0">默认</option> 
                <?php foreach ($room as $key => $v) :?>
               <option value="<?php echo $v['r_id']; ?>" <?php if($v['r_id']==$arr['r_id']) echo "selected";?>>
               <?php echo $v['r_id']; ?></option>
               <?php endforeach;?>
               </select> 
            <p>
            
            <p>  
              <font color=red>*</font>标题：
              <input class="text-input small-input" type="text" id="small-input" name="name" value="<?php echo ($arr["name"]); ?>"/>
            <p>
             <p>
             <label> META Keywords(关键词，关键字中间用半角逗号隔开)：</label>
              <textarea   id="textarea" name="keywords" value="<?php echo ($arr["keywords"]); ?>"  rows="3"/>
              </textarea>
            <p>
            <p>
              <label>META Description(描述，针对搜索引擎设置的网页描述)：</label>
              <textarea   id="textarea" name="description" value="<?php echo ($arr["description"]); ?>"  rows="4"/>
              </textarea>
            <p>
            <p>
              显示排序：
              <input class="text-input small-input" type="text" id="small-input" name="sort" value="<?php echo ($arr["sort"]); ?>"/>
            <p>
            <p>
              浏览次数：
              <input class="text-input small-input" type="text" id="small-input" name="click" value="<?php echo ($arr["click"]); ?>"/>
            <p>
            <p>
              发布时间：
              <input class="text-input small-input" type="text" id="small-input" name="add_time" value="<?php echo ($arr["add_time"]); ?>"/>
            <p>
            <p>
              文档属性：
              <input  type="checkbox" id="small-input" name="flag[]" value="<?php echo ($arr["flag"]); ?>"/>
              <span>推荐</span>
              <input  type="checkbox" id="small-input" name="flag[]" value="<?php echo ($arr["flag"]); ?>"/>
              <span>头条</span>
              <input  type="checkbox" id="small-input" name="flag[]" value="<?php echo ($arr["flag"]); ?>"/>
              <span>视图</span>
            <p>
            <p>
              状态：
              <input  type="radio" id="small-input" name="verifystate" value="<?php echo ($arr["flag"]); ?>"/>
              <span>未审核</span>
              <input  type="radio" id="small-input" name="verifystate" value="<?php echo ($arr["flag"]); ?>"/>
              <span>通过</span>
            <p>
            <p>
              图片：
              <input class="text-input small-input" type="file" id="small-input" name="image" value="<?php echo ($arr["image"]); ?>"/><br>       
              <?php if(!empty($arr['image'])):?>
              <img src="http://localhost/tb//<?php echo ($arr["image"]); ?>">
              <?php endif;?>  
            </p>
            <!-- <p>
              文件：
              <input class="text-input small-input" type="file" id="small-input" name="image" value="<?php echo ($arr["image"]); ?>"/><br>       
              <?php if(!empty($arr['image'])):?>
              <img src="http://localhost/tb//<?php echo ($arr["image"]); ?>">
              <?php endif;?>  
            </p> -->
            <p>
              <label>详情描述</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
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