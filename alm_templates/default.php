<div class="project">
    <?php
    $project_meta = get_post_custom();
    $project_url = $project_meta['wpcf-url'][0];
    ?>
    <div class="img">
        <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail('medium');?>
        </a>
    </div>
    <div class="title">
        <a href="<?php the_permalink();?>">
            <?php the_title();?>
        </a>
    </div>
    <div class="url">
        <a href="<?php echo $project_url?>"><?php echo $project_url;?></a>
    </div>
</div>
