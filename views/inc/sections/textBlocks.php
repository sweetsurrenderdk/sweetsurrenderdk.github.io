<section class="text-blocks">
    <div class="container">
        <?php if($content->heading ) { ?>
            <h2><?php echo $content->heading; ?></h2>
        <?php } ?>

        <?php foreach($content->textBlocks as $array_item) { ?>
            <?php $text_block = $array_item->value; ?>

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
