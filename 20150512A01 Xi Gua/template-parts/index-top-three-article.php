<?php if (defined('STICK_TOP_CAT_ID')):?>
<?php $top_three_query = new WP_Query(array('cat' => STICK_TOP_CAT_ID, 'posts_per_page' => 3, 'paged' => 1, 'ignore_sticky_posts' => 1));?>
<?php if ($top_three_query->have_posts()):?>
<div class="top-three-articles row">
<?php while($top_three_query->have_posts()) : $top_three_query->the_post();?>
<div class="col-md-4">

    <a href="<?php echo esc_url(get_permalink())?>">
       <?php echo get_the_post_thumbnail(get_the_ID(), 'post_thumbnail', array('class' => 'img-responsive', 'alt' => get_the_title()));?>
    </a>

    <p class="category">
        <?php 
            $categories = xigua_get_the_category();
            $cat = end($categories);
        ?>
        <a href="<?php echo esc_url(get_category_link($cat->term_id))?>">
          <?php echo $cat->name?>
        </a>
    </p>
    <h1 class="title text-oneline" title="<?php the_title()?>">
       <a href="<?php echo esc_url(get_permalink())?>">
            <?php the_title()?>
        </a>
    </h1>
    <p class="author">
        作者：
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>">
           <?php the_author()?>
        </a>
    </p>
    <p class="summary">
       <?php echo xigua_get_the_excerpt(50)?>
    </p>
</div>
<?php endwhile;?>
</div>
<?php endif?>
<?php endif?>