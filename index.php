<?php get_header(); ?>
<main>
<?php if(have_posts()): while(have_posts()):the_post(); ?>
  <div class="post">  
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
  <p><?php the_category(', '); ?></p>
	 <?php the_post_thumbnail(); ?>
  <p><?php the_content('Read more'); ?></p>
    <div class ="clearLeft">
    </div>
  </div>
<?php endwhile; endif; ?>
 
<p class="pagelink">
<span class="oldpage"><?php next_posts_link('&laquo;　古い記事'); ?></span>
<span class="newpage"><?php previous_posts_link('新しい記事　&raquo;'); ?></span>
</p>

</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
