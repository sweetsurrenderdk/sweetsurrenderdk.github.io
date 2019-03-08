<section class="supported-organisations">
    <div class="container">
        <?php foreach(org in $content->organisations ) { ?>
            <div class="org">
                <img src="<?php echo HashBrown\get_media_url($org->image); ?>" />
                <h4 class="org-title"><?php echo org->title; ?></h4>
                <p class="org-period"><?php echo org->period; ?></p>
                <p class="org-amount"><?php echo org->amount; ?></p>
                
                <?php if(org->comment ) { ?>
                    <p class="org-comment"><?php echo org->comment; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
