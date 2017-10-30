<!-- このファイル：sitemap.php はダミーです。sitemapファイルがあるかないかの判断で使っているだけであり、内容は意味をもちません -->
<?php get_header(); ?>

<main>

<?php
$lastposts = get_posts('posts_per_page=-1');
global $post;
foreach($lastposts as $post) :
setup_postdata($post);
?>
<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a><br />
<?php endforeach; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>