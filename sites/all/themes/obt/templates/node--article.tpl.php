<?php $tag = ($view_mode != 'full')? 'div' : 'article'; ?>
<<?php print $tag; ?> id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
  <?php if ($view_mode == 'teaser') { ?>
  <?php /* ----------------- TEASER DISPLAY ----------------- */ ?>
    <a href="<?php print $node_url; ?>" class="image-and-content">
      <?php if (isset($images[0]['uri'])){ ?>
      <div class="image">
        <img src="<?php print image_style_url('ratio_4_3', $images[0]['uri']); ?>" alt="<?php print $images[0]['attr']['alt']; ?>" title="<?php print $images[0]['attr']['title']; ?>"/>
      </div>
      <?php } ?>
      <div class="content">
        <h2><?php print $title; ?></h2>
      	<?php if (isset($node_body_summary_html)){ ?>
      	<div class="summary">
          <p><?php print $node_body_summary_html; ?></p>
      	</div>
        <?php } ?>
        <?php if (isset($video_id)) { ?>
        <div class="play"></div>
        <?php } ?>
    	</div>
    </a>
    <?php if (isset($article_info)) { ?>
      <footer class="article-info">
        <?php print $article_info; ?>
      </footer>
    <?php } ?>
  <?php } elseif ($view_mode == 'full') { ?>
  <?php /* ----------------- FULL DISPLAY ----------------- */ ?>
  <?php if (isset($article_pager)){ ?>
  <div class="article-pager">
    <?php if (isset($article_pager['previous'])){ ?>
    <div class="pager previous">
      <a href="<?php print $article_pager['previous']['url']; ?>">
        <i class="arrow"></i>
        <img src="<?php print image_style_url('ratio_1_1', $article_pager['previous']['img_path']); ?>" />
        <p><?php print $article_pager['previous']['title']; ?></p>
      </a>
    </div>
    <?php } ?>
    <?php if (isset($article_pager['next'])){ ?>
    <div class="pager next">
      <a href="<?php print $article_pager['next']['url']; ?>">
        <i class="arrow"></i>
        <img src="<?php print image_style_url('ratio_1_1', $article_pager['next']['img_path']); ?>" />
        <p><?php print $article_pager['next']['title']; ?></p>
      </a>
    </div>
    <?php } ?>
  </div>
  <?php } ?>
  <section class="main-content">
    <div class="pre-header">
      <h2><?php print $article_type; ?></h2>
    </div>
    <header>
      <?php if (isset($subtitle)) { ?>
      <div class="subtitle"><?php print $subtitle; ?></div>
      <?php } ?>
      <h1><?php print $title; ?></h1>
    </header>
    <div class="content">
       <?php if (isset($images[0]['uri']) && count($images) > 0 && !isset($video_id)){ ?>
       <div class="image">
          <figure>
            <img src="<?php print image_style_url('ratio_16_9', $images[0]['uri']); ?>" alt="<?php print $images[0]['attr']['alt']; ?>" title="<?php print $images[0]['attr']['title']; ?>"/>
            <figcaption>
              <?php if (isset($images[0]['description'])){ ?>
                <?php print $images[0]['description']; ?>
              <?php } ?>
              <?php if (isset($images[0]['credits']['text'])){ ?>
                <p class="credits">| <?php print $images[0]['credits']['text']; ?></p>
              <?php } ?>
            </figcaption>
          </figure>
       </div>
       <?php } ?>

      <?php if (isset($video_id)) { ?>
      <div class="video">
        <iframe width="560" height="315" src="//www.youtube.com/embed<?php print $video_id; ?>" frameborder="0" allowfullscreen></iframe>
      </div>
      <?php } ?>

      <?php if (isset($article_info)) { ?>
        <aside class="article-info">
          <?php print $article_info; ?>
        </aside>
      <?php } ?>

      <?php if (isset($social)) { ?>
        <aside class="social">
          <?php print $social; ?>
        </aside>
      <?php } ?>

      <div class="body">
        <?php if (isset($node_body_html)) { ?>
        <?php print $node_body_html; ?>
        <?php } ?>

        <?php if (isset($document_link)) { ?>
        <?php print $document_link; ?>
        <?php } ?>
      </div>

      <?php if (isset($node_tags)) { ?>
      <aside class="tags">
        <?php print $node_tags; ?>
      </aside>
      <?php } ?>

    </div><!-- /.content -->
  </section><!-- /.main-content -->

  <?php if (isset($related)) { ?>
  <aside class="related">
    <header>
      <h1><?php print t('Related content'); ?></h1>
    </header>
    <div class="content">
    <?php foreach ($related as $key => $related_content) { ?>
      <?php print $related_content['display']; ?>
    <?php } ?>
    </div>
  </aside>
  <?php } ?>

  <?php } ?>

</<?php print $tag; ?>> <!-- /node-->