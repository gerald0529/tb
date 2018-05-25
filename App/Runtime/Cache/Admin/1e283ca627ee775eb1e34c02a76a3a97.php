<?php if (!defined('THINK_PATH')) exit();?>  <link rel="stylesheet" href="Public/Admin//kindeditor/themes/default/default.css" />
  <script charset="utf-8" src="Public/Admin//kindeditor/kindeditor-min.js"></script>
  <script charset="utf-8" src="Public/Admin//kindeditor/zh_CN.js"></script>
  
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
            <input class="text-input small-input" type="hidden" id="small-input" name="resource" value="<?php echo ($_SESSION["user"]); ?>"/>
            <p>
             <label>商品信息（有<font color=red>*</font>为必填或必选）</label>
             </p>
             <p>
              <font color=red>*</font>所属栏目：
              <select name="cid" class="small-input1"    style="width:120px;">
               <option value="0">默认</option> 
                <?php foreach ($news as $key => $v) :?>
               <option value="<?php echo $v['cid']; ?>" <?php if($v['cid']==$arr['cid']) echo "selected";?>>
               <?php echo $v['name']; ?></option>
               <?php endforeach;?>
               </select> 
            </p>
            
            <p>  
              <font color=red>*</font>标题：
              <input class="text-input small-input" type="text" id="small-input" name="title" value="<?php echo ($arr["title"]); ?>"/>
            </p>
             <p>
             <label> META Keywords(关键词，关键字中间用半角逗号隔开)：</label>
              <textarea   id="textarea" name="keywords"   rows="3"/><?php echo ($arr["keywords"]); ?>
              </textarea>
            </p>
            <p>
              <label>META Description(描述，针对搜索引擎设置的网页描述)：</label>
              <textarea   id="textarea" name="description"   rows="4"/><?php echo ($arr["description"]); ?>
              </textarea>
            </p>
            <p>
              显示排序：
              <input class="text-input small-input" type="text" id="small-input" name="sort" value="<?php echo ($arr["sort"]); ?>"/>
            </p>
            <p>
              浏览次数：
              <input class="text-input small-input" type="text" id="small-input" name="click" value="<?php echo ($arr["click"]); ?>"/>
            </p>
            <?php if($arr["add_time"] != null): ?><p>
              发布时间：
              <input class="text-input small-input" type="text" id="small-input" name="add_time" value="<?php echo ($arr["add_time"]); ?>"/>
            </p><?php endif; ?>
            <p>
              文档属性：
              <input  type="checkbox" id="small-input" name="flag[]" value="图文"
              <?php if(strstr($arr['flag'],'图文')) echo 'checked="checked"';?>/>
              <span>图文</span>
              <input  type="checkbox" id="small-input" name="flag[]" value="头条"
              <?php if(strstr($arr['flag'],'头条')) echo 'checked="checked"';?>/>
              <span>头条</span>
              <input  type="checkbox" id="small-input" name="flag[]" value="推荐"
              <?php if(strstr($arr['flag'],'推荐')) echo 'checked="checked"';?>/>
              <span>推荐</span>
            </p>
            <p>
              状态：
              <input  type="radio" id="small-input" name="verifystate" value="0" <?php if($arr['verifystate'] == 0) echo 'checked="checked"';?>/>
              <span>未审核</span>
              <input  type="radio" id="small-input" name="verifystate" value="1" <?php if($arr['verifystate'] == 1 ) echo 'checked="checked"';?>/>
              <span>通过</span>
            </p>
            <p>
              上传图片：
              <font color="red">(注：①若不选择分类项，则默认为不成缩略图)</font>
              </label>
             <!--  <div style="width:800px; height:600px; border:1px solid #999;"> </div> -->
              <div id="t">分类:   
              <input type="radio" name="thub" value=1 />缩略图一(1000*500) 
              <input type="radio" name="thub" value=2 />缩略图二(400*200)</div><br>
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
              上传文件：
              <input class="text-input small-input" type="text" id="small-input" name="file" value=""/>（暂时未可用）<br>       
              <!-- <input class="text-input small-input" type="button" id="small-input" name="image" value="上传文件"/> -->
            </p> 
            <p>
              <label>详情描述</label>
              <!-- <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea> -->
              <textarea name="body" style="width:100%;height:400px;visibility:hidden;"><?php echo ($arr["body"]); ?></textarea> 
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
    <script>
      var editor;
      KindEditor.ready(function(K) {
        editor = K.create('textarea[name="body"]', {
          allowFileManager : true
        });

      });
    </script>