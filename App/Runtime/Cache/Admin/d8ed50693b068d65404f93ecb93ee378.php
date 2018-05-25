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
            <input class="text-input small-input" type="hidden" id="small-input" name="id" value="<?php echo ($arr["id"]); ?>"/>
            <!-- <input class="text-input small-input" type="hidden" id="small-input" name="resource" value="<?php echo ($_SESSION["user"]); ?>"/> -->
            <p>
             <label>商品信息（有<font color=red>*</font>为必填或必选）</label>
             </p>
             
             <p>  
              <font color=red>*</font>所属栏目：
              <select name="pid" class="small-input1"    style="width:120px;">
               <option value="0">顶级</option> 
                <?php foreach ($abb as $key => $v) :?>
                  <?php if($v['level'] <= 1):?>
                <option value="<?php echo $v['id']; ?>" <?php if($v['id']==$arr['pid']) echo "selected='selected'";?>>
                  <?php else:?>
                <option value="<?php echo $v['id']; ?>" disabled='disabled'>
                <?php endif; ?>    
               <?php echo $v['tt'].$v['title']; ?></option>
               <?php endforeach;?>
               </select> 
            </p> 
            <p>  
              <font color=red>*</font>规则标识：
              <input class="text-input small-input" type="text" id="small-input" name="name" value="<?php echo ($arr["name"]); ?>"/>
            </p>
             <p>  
              规则名称：
              <input class="text-input small-input" type="text" id="small-input" name="title" value="<?php echo ($arr["title"]); ?>"/>
            </p>
            <p>  
              状态：
              <input  type="radio" id="small-input" name="status" value="0" <?php if($arr['status'] == 0) echo 'checked="checked"';?>/>
              <span>禁用</span>
              <input  type="radio" id="small-input" name="status" value="1" <?php if($arr['status'] == 1 ) echo 'checked="checked"';?>/>
              <span>启用</span>
            </p>
            <p>  
              显示：
              <input  type="radio" id="small-input" name="is_show" value="0" <?php if($arr['is_show'] == 0) echo 'checked="checked"';?>/>
              <span>屏蔽</span>
              <input  type="radio" id="small-input" name="is_show" value="1" <?php if($arr['is_show'] == 1 ) echo 'checked="checked"';?>/>
              <span>显示</span>
            </p>
            <p>  
              排序：
              <input class="text-input small-input" type="text" id="small-input" name="sort" value="<?php echo ($arr["sort"]); ?>"/>
            </p>
            <p>
              <label>条件描述</label>
               <textarea id="textarea" name="condition" cols="79" rows="3"></textarea>            
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