<section class="full-height-banner <?php if(isset($content->theme)) { echo $content->theme; } ?>" style="background-image: url('<?php echo HashBrown\get_media_url($content->backgroundImage); ?>');">
    <div class="container">
        <?php if(isset($content->text)) { echo $content->text; } ?>

        <?php if(isset($content->button->text)) { ?>
            <a class="btn" href="<?php echo $content->button->href; ?>" target="<?php echo $content->button->target; ?>"><span><?php echo $content->button->text; ?></span></a>
        <?php } ?>

        <?php if(isset($content->buttons)) { ?>
            <?php foreach($content->buttons as $button) { ?> 
                <a class="btn" href="<?php echo $button->href; ?>" target="<?php echo $button->target; ?>"><span><?php echo $button->text; ?></span></a>
            <?php } ?>
        <?php } ?>
    </div>
</section>
