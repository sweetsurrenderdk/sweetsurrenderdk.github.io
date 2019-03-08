<section class="text-blocks">
    <div class="container">
        <?php if($content->heading ) { ?>
            <h2><?php echo $content->heading; ?></h2>
        <?php } ?>

        <?php foreach(text_block in $content->textBlocks ) { ?>
            <div class="text-block">
                <?php if(isset($text_block->text)) { ?>
                    <div class="text"><?php echo $text_block->text; ?></div>
                <?php } ?>
                <?php if(isset($text_block->image)) { ?>
                    <div class="image"><img src="<?php echo HashBrown\get_media_url($text_block->image); ?>" /></div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
