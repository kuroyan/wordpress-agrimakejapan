<?php get_header(); ?>

<main class = "left">

<?php if(have_posts()): while(have_posts()):the_post(); ?>
  <div class="post">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
    <p><?php the_category(', '); ?></p>
	<?php the_post_thumbnail(); ?>
	
	  <?php $cat = get_the_category(); $cat_name = $cat[0]->name; ?>
	
	  <?php if( $cat_name =='価格' || $cat_name =='本' ): ?>

		<i class="best <?php echo get_post_meta($post->ID, 'book_label', true); ?>"></i>
  
		      <?php if(get_post_meta($post->ID, 'book_label', true)): ?>
				<h3><font color='blue'>** ベストセラーになっています **</font></h3>
        	    <?php show_book( $post->ID ); ?>

    	  	<?php else: ?>

            	<?php show_book( $post->ID ); ?>

		  <?php endif; ?>

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


<?php
function show_book( $p )
{
    //--題名の出力方法
    echo "<h2>".get_post_meta($p, 'book_name', true)."</h2>";
    //--作者の出力方法
    echo "<p>作者： ".get_post_meta($p, 'book_author', true)."</p>";
    //---価格の出力方法
    echo "<span>".get_post_meta($p, 'book_price', true).'円'."</span>";
    echo "<i class='best is-on'></i>";
}
