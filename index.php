<?php get_header()?>
<div class="contentcontainer">
	<div id="contentwrapper">
		<div class="heightVar <?php if(is_category()): echo 'big'; endif; ?>">
			<div id="isotope" class="content">
				<?php while ( have_posts() ) : the_post();
					if ( has_post_format( 'image' )) {
						get_template_part( 'content-image', get_post_format() );
					}
					else if ( has_post_format( 'gallery' )) {
						get_template_part( 'content-gallery', get_post_format() );
					}
					else if ( has_post_format( 'link' )){
						get_template_part( 'content-link', get_post_format() );				
					}
					else{
						get_template_part( 'content-blogpost', get_post_format() );
					}
				endwhile;?> 

                <div id="links" class="item item-isotope">
                    <div class="link">
                        <a href="https://github.com/maxdup" target="_blank">
                            <img title="my github"
                                src="http://www.mdupuis.com/wp-content/themes/prolixMax/icon/icons-04.png">
                        </a>
                    </div>
                    <div class="link">
                        <a href="https://www.youtube.com/channel/UCAWEmDvCDg7X-3AHJdpQqUQ" target="_blank">
                            <img title="my youtube channel"
                                src="http://www.mdupuis.com/wp-content/themes/prolixMax/icon/icons-03.png">
                        </a>
                    </div>
                    <div class="link">
                        <a href="https://www.facebook.com/mdupuis" target="_blank">
                            <img title="my facebook"
                                 src="http://www.mdupuis.com/wp-content/themes/prolixMax/icon/icons-01.png">
                        </a>
                    </div>
                    <div class="link">
                        <a href="http://ca.linkedin.com/pub/maxime-dupuis/72/560/b11" target="_blank">
                            <img title="my linkedin" src="http://www.mdupuis.com/wp-content/themes/prolixMax/icon/icons-02.png">
                        </a>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<?php get_footer()?>
