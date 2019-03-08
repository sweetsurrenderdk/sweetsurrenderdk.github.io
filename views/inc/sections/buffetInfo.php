<section class="buffet-info">
    <div class="container">
        <?php if(isset($content->heading)) { ?>
            <h2 id="<?php echo slugify($content->heading); ?>"><?php echo $content->heading; ?></h2>
        <?php } ?>

        <?php if(isset($content->subheading)) { ?>
            <h4><?php echo $content->subheading; ?></h4>
        <?php } ?>

        <?php echo $content->body; ?>

        <div class="flex images">
            <?php foreach($content->images as $image_id) { ?>
                <div class="image-container">
                    <div class="image" style="background-image: url('<?php echo HashBrown\get_media_url($image_id); ?>');"></div>
                </div>
            <?php } ?>
        </div>

        <div class="flex texts">
            <div class="brunch-text">
                <?php echo $content->brunchText; ?>
            </div>
            <div class="lunch-text">
                <?php echo $content->lunchText; ?>
            </div>
        </div>
    </div>
</section>
