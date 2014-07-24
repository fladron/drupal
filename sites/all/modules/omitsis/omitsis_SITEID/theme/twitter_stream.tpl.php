<ul class="twitter-stream-items">
  <?php foreach ($stream as $tweet) { ?>
  <li>
    <h2 class="author name"><?php print $tweet['user_name']; ?></h2>
    <h3 class="alias"><?php print $tweet['user_alias']; ?></h3>
    <time><?php print $tweet['date']; ?></time>
    <p><?php print $tweet['body']; ?></p>
  </li>
  <?php } ?>
</ul>