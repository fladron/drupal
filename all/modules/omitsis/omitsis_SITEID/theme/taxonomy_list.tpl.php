<div class="taxonomy-list <?php print $class; ?>-list">
  <ul>
  <?php foreach ($list as $item){ ?>
    <li data-term="<?php print $item['tid']; ?>">
    	<h2><?php print $item['name']; ?></h2>
    	<?php if (!empty($item['description'])){ ?>
    	<div class="description">
    		<?php print $item['description']; ?>
    	</div>
    	<?php } ?>
    </li>
  <?php } ?>
  </ul>
</div>