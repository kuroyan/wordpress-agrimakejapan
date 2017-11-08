<?php get_header('withimg'); ?>

<div id="search-box">
<form method="get" action="<?php bloginfo( 'url' ); ?>">
<table><td><input name="s" id="s" type="text" />
  <input id="submit" type="submit" value="検索" /></td>
  <td><a href ="http://agri.makejapan.jp/wp-admin">サイト管理</a></td>
</table>  
</form>
</div

  
<main>
  
<?php if(have_posts()): while(have_posts()):the_post(); ?>
  <div class="post">  
  <h1><?php the_title(); ?></h1>
  <?php if( !is_page('sitemap')) { ?>
  <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
  <?php }; ?>
  <p><?php the_content(); ?></p>
	<?php the_post_thumbnail(); ?>
	<?php edit_post_link('この記事を編集', '<p>', '</p>'); ?>

  <?php if (is_page('sitemap')) { ?>
    <?php
      $lastposts = get_posts('posts_per_page=-1');
      global $post;
      foreach($lastposts as $post) :
      setup_postdata($post);
	  ?>
    ・<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a><br />
     <?php endforeach; ?>
  <?php }; ?>

  <div class="clearLeft"></div>
  </div>
<?php endwhile; endif; ?>

</main>
<!--
<?php get_sidebar(); ?>
-->
<?php get_footer(); ?>