<?php echo validation_errors(); ?>
<div class="col-md-10">

  <form action="/index.php/topic/add" method="post" >
    <input type="text"  name="title" class="col-md-12" placeholder="제목">

    <textarea id="description" name="description" rows="15" class="col-md-12" placeholder="본문">
    </textarea>

    <input type="submit"  name="제출" class="btn btn-primary"/ >
  </form>
</div>
<script src="/static/lib/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('description',{
    'filebrowserUploadUrl':'/index.php/topic/upload_receive_from_ck'
  });
</script>
