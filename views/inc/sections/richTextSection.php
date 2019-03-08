<section class="rich-text-section <?php echo $content->theme; ?>" style="background-image: url('{% include hashbrown/get_media_by_id id=$content->backgroundImage %}');">
    <div class="container">
        <?php if($content->text ) { ?>
            {{ $content->text | markdownify }}
        <?php } ?>
        
        <div class="flex images">
            <?php foreach($content->images as $image_id) { ?>
                <div class="image-container">
                    <div class="image" style="background-image: url('<?php echo HashBrown\get_media_url($image_id); ?>');"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
