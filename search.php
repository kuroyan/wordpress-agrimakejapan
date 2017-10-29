<?php get_header(); ?>

<main>
  
<P>「<?php the_search_query(); ?>」で検索した結果です。</p>

<p><?php echo get_the_date('Y年n月'); ?></p>

<?php if(have_posts()): while(have_posts()):the_post(); ?>
  <div class="post">
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  
  <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
  <p><?php the_category(', '); ?></p>
  
  <!--アイキャッチ画像-->
  <?php if( has_post_thumbnail() ): ?>
  <a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail('thumbnail'); ?></a>
　<?php else: ?>
  <a href="<?php the_permalink(); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" ></a>
　<?php endif; ?>
  <!--アイキャッチ画像End-->
  
  <p><?php the_content('Read more'); ?></p>
	  <div class ="clearLeft">
      </div>
  </div>
  
<?php endwhile; ?>
  
<?php previous_posts_link('新しい投稿ページへ'); ?>
<?php next_posts_link('古い投稿ページへ'); ?>
  
<?php else: ?>
  
  <P>記事は見つかりませんでした。</P>
  
<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>​
