<section class="rich-text-section <?php if(isset($content->theme)) { echo $content->theme; } ?>" <?php if(isset($content->backgroundImage)) { ?>style="background-image: url('<?php echo HashBrown\get_media_url($content->backgroundImage); ?>');"<?php } ?>>
    <div class="container">
        <?php if(isset($content->text)) { echo $content->text; } ?>

        <?php if(isset($content->images)) { ?>
            <div class="flex images">
                <?php foreach($content->images as $array_item) { ?>
                    <div class="image-container">
                        <div class="image" style="background-image: url('<?php echo HashBrown\get_media_url($array_item->value); ?>');"></div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
