
<div class="article-of-the-day row">
        <?php $newest_query = new WP_Query(array('paged' => 1, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1)); 
        ?>
        
        <?php while ($newest_query->have_posts()) : $newest_query->the_post();?>
       <div class="col-md-7">
            <a href="<?php echo esc_url(get_permalink())?>">
               <?php echo get_the_post_thumbnail(get_the_ID(), 'post_thumbnail', array('class' => 'img-responsive', 'alt' => get_the_title()));?>
            </a>
        </div>
        
        <div class="col-md-5">
            <?php 
                $categories = xigua_get_the_category();
                $cat = end($categories);
            ?>
            <p class="category">
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
                <?php echo xigua_get_the_excerpt(100);?>
            </p>
        </div>
        <?php endWhile?>
        <?php wp_reset_postdata()?>
</div>
