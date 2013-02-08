
<!--{{feature-image:http://localhost/CodeIgniter/images/boxer.jpg }}-->

<div id="uploadContainer" class="clearfix draggable" style="width:100%;float:left;margin:30px;">
   
   <?//php if (!isset($upload_data)) $upload=$data;?>

<p><?php //echo anchor('upload', 'Upload Another File!'); ?></p>
<p>Upload a file to edit</p>
<div class="span-17">
  <?php if (isset($error)){echo $error;}?>

  <?php echo form_open_multipart('upload/do_upload/load');?>

  <input type="file" name="userfile" size="20" />

  <br /><br />

  <input type="submit" value="upload" />

</form>
</div>


    <!--end container -->
</div>