<div class="col-md-2">
  <?php
  foreach ($topics as $entry) {
  ?>
    <li>
      <a href="http://localhost/index.php/topic/get/<?=$entry->id?>">
        <?=$entry->title?>
      </a>
    </li>

  <?php
  }
  ?>
</div>
