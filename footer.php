<footer>
  &copy;2017田舎ライフ
</footer>

<div id="search-box">
<form method="get" action="<?php bloginfo( 'url' ); ?>">
    <input name="s" id="s" type="text" />
    <input id="submit" type="submit" value="検索" />
</form>
</div>

    <?php get_template_part( 'slider' ); ?>
<?php wp_footer(); ?>
</body>
</html>