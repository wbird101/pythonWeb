<div class="col-md-10">
  <article>
    <h1> <?=$topic->title?></h1>
    <div><?=kdate($topic->created)?></div>
    <div>
      <?=auto_link($topic->description)?>
    </div>
  </article>
  <div>
    <a href='/index.php/topic/add' class='btn btn-light' role="button">추가</a>
  </div>
</div>
