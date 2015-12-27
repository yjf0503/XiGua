<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xigua
 */

get_header();?>
    <!--get the newest sticky post(the article of the day)--> 
    <?php get_template_part( 'template-parts/index-article-of-the-day');?>
    
   <hr class="divider-main"/>
   
   <?php get_template_part( 'template-parts/index-top-three-article');?>
   
   <hr class="divider-main"/>
   
   <!--catgegory reading-methodology-->
   <?php $catID = 2;?>
   <?php 
   $cat_query = new WP_Query(array('cat' => $catID, 'posts_per_page' => 3, 'paged' => 1, 'ignore_sticky_posts' => 1));
   ?>
   <?php if ($cat_query->have_posts()):?>
  
   <div class="category-articles row">
        <h2 class="category-icon">
            <a href="<?php echo esc_url(get_category_link($catID));?>">
                <i class="fa fa-microphone-slash fa-lg"></i>
                <br/>
               <?php echo get_the_category_by_ID($catID);?>
            </a>
        </h2>
        <?php while($cat_query->have_posts()) : $cat_query->the_post();?>
        <?php get_template_part('template-parts/index-category-article');?>
        <?php endwhile;?>
        <?php wp_reset_postdata()?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a class="btn btn-lg btn-default btn-block" href="#">
                    看更多文章
                </a>
            </div>
        </div>
    </div>   
    <hr class="divider-main"/>
    <?php endif?>
    
    
    <!--catgegory family-education-->
   <?php $catID = 4;?>
   <?php $cat_query = new WP_Query(array('cat' => $catID, 'posts_per_page' => 3, 'paged' => 1, 'ignore_sticky_posts' => 1))?>
   <?php if ($cat_query->have_posts()):?>
  
   <div class="category-articles row">
        <h2 class="category-icon">
            <a href="<?php echo esc_url(get_category_link($catID));?>">
                <i class="fa fa-microphone-slash fa-lg"></i>
                <br/>
               <?php echo get_the_category_by_ID($catID);?>
            </a>
        </h2>
        <?php while($cat_query->have_posts()) : $cat_query->the_post();?>
        <?php get_template_part('template-parts/index-category-article');?>
        <?php endwhile;?>
        <?php wp_reset_postdata()?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a class="btn btn-lg btn-default btn-block" href="#">
                    看更多文章
                </a>
            </div>
        </div>
    </div>   
    <hr class="divider-main"/>
    <?php endif?>
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
