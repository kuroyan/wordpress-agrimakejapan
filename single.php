<?php get_header(); ?>

<main>

<?php if(have_posts()): while(have_posts()):the_post(); ?>
  <div class="post">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
    <p><?php the_category(', '); ?></p>
	<?php the_post_thumbnail(); ?>
	
	<?php if(get_post_meta($post->ID, 'book_label', true)): ?>

    <i class="best <?php echo get_post_meta($post->ID, 'book_label', true); ?>"></i>
	<h3><font color='blue'>** ベストセラーになっています **</font></h3>
		<!--題名の出力方法-->
		<h2><?php echo get_post_meta($post->ID, 'book_name', true); ?></h2>
		 
		<!--作者の出力方法-->
		<p><?php echo '作者： '; echo get_post_meta($post->ID, 'book_author', true); ?></p>
		 
		<!--価格の出力方法-->
		<span><?php echo get_post_meta($post->ID, 'book_price', true); echo'円'; ?></span>
	   
	  <!--ベストセラーラベルの出力結果例-->
	  <i class="best is-on"></i>
	
	<?php else: ?>
	  <!--題名の出力方法-->
	  <h2><?php echo get_post_meta($post->ID, 'book_name', true); ?></h2>
	   
	  <!--作者の出力方法-->
	  <p><?php echo '作者： '; echo get_post_meta($post->ID, 'book_author', true); ?></p>
	   
	  <!--価格の出力方法-->
	  <span><?php echo get_post_meta($post->ID, 'book_price', true); echo'円'; ?></span>

	  <i class="best is-on"></i>
	
  <?php endif; ?>
  
	
	  <p><?php the_content('Read more'); ?></p>
      <div class ="clearLeft">
      </div>
  </div>

  <?php endwhile; endif; ?>

<p class="pagelink">
  <span class="oldpage"><?php previous_post_link('%link','&laquo;　古い記事へ'); ?></span>
  <span class="newpage"><?php next_post_link('%link','新しい記事　&raquo;'); ?></span>
</p>
  
</main>


<?php get_sidebar(); ?>

<?php get_footer(); ?>