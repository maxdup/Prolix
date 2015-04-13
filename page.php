<?php get_header()?>

<div id="contentvertical">
    <div class="contentblogpost">
        <div class="pagecontent">
            <?php while (have_posts()): the_post()?>
                <h2><?php the_title()?></h2>
                <?php the_content();?>
			<?php endwhile;?>
        </div>
    <div>
    <?php comments_template();?>

</div>
<?php get_footer()?>
