<section class="supported-organisations">
    <div class="container">
        <?php foreach($content->organisations as $array_item) { ?>
            <?php $org = $array_item->value; ?>

            <div class="org">
                <?php if(isset($org->image) ) { ?>
                    <img src="<?php echo HashBrown\get_media_url($org->image); ?>" />
                <?php } ?>
                
                <?php if(isset($org->title) ) { ?>
                    <h4 class="org-title"><?php echo $org->title; ?></h4>
                <?php } ?>
                
                <?php if(isset($org->period) ) { ?>
                    <p class="org-period"><?php echo $org->period; ?></p>
                <?php } ?>
                
                <?php if(isset($org->amount) ) { ?>
                    <p class="org-amount"><?php echo $org->amount; ?></p>
                <?php } ?>
                
                <?php if(isset($org->comment) ) { ?>
                    <p class="org-comment"><?php echo $org->comment; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
