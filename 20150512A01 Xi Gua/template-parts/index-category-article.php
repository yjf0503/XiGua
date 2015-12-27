<div class="col-md-12">

    <div class="row article">
        <div class="col-md-2">
            <p class="date">
                <?php echo get_the_date();?>
            </p>
            <p class="category">
                <?php 
                    $categories = xigua_get_the_category();
                    
                    $endCat = end($categories);
                ?>
                <a href="<?php echo esc_url(get_category_link($endCat->term_id))?>">
                  <?php 
                     
                     echo $endCat->name;
                  ?>
                </a>
            </p>
        </div>

        <div class="col-md-3">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'post_thumbnail', array('class' => 'img-responsive', 'alt' => get_the_title()));?>
            
        </div>

        <div class="col-md-7">
            <h1 class="title text-oneline"  title="<?php the_title()?>">
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
    </div>

</div>
