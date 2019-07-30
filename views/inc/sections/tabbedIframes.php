<section class="tabbed-iframes">
    <a class="section-anchor" id="tabbed-iframes"></a>

    <div class="container">
        <?php if(isset($content->heading)) { ?>
            <h2><?php echo $content->heading; ?></h2>
        <?php } ?>

        <?php if(isset($content->iframes)) { ?>
            <div class="tabbed-content" data-active-tab="1">
                <div class="tab-buttons">
                    <?php foreach($content->iframes as $i => $array_item) { ?>
                        <button onclick="this.parentElement.parentElement.dataset.activeTab = <?php echo $i + 1; ?>;"><?php echo $array_item->value->tabName; ?></button>
                    <?php } ?>
                </div>

                <div class="tab-panes">
                    <?php foreach($content->iframes as $i => $array_item) { ?>
                        <iframe scrolling="no" <?php if(isset($array_item->value->height)) { ?>style="height: <?php echo $array_item->value->height; ?>"<?php } ?> id="tab-content-<?php echo $i + 1; ?>" src="<?php echo $array_item->value->iFrameUrl; ?>"></iframe>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
