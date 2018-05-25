<?php if (!defined('THINK_PATH')) exit();?>
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
            <!-- <input class="text-input small-input" type="hidden" id="small-input" name="cmid" value="<?php echo ($arr["cmid"]); ?>"/> -->
            
            <p>
             <label>留言详情：（有<font color=red>*</font>为必填或必选）</label>
             </p>
            <p>
              留言人：<?php echo ($arr["people"]); ?>
            </p>
            <p>  
              留言主题：<?php echo ($arr["theme"]); ?>
            </p> 
            <p>
              手机号：<?php echo ($arr["tel"]); ?>
            </p>
            <p>
              Email地址：<?php echo ($arr["email"]); ?>
            </p>
            <p>
              地址：<?php echo ($arr["address"]); ?>
            </p>
            <p>
              留言时间：<?php echo ($arr["addtime"]); ?>
            </p>
            <p>
              留言内容：<?php echo ($arr["body"]); ?>
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