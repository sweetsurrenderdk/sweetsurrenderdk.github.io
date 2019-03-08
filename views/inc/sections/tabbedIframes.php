<section class="tabbed-iframes">
    <a class="section-anchor" id="tabbed-iframes"></a>

    <div class="container">
        <h2><?php echo $content->heading; ?></h2>

        <div class="tabbed-content" data-active-tab="1">
            <div class="tab-buttons">
                <?php foreach($content->iframes as $i => $tabbed_content) { ?>
                    <button onclick="this->parentElement->parentElement->dataset->activeTab = <?php echo $i; ?>;"><?php echo $tabbed_content->tabName; ?></button>
                <?php } ?>
            </div>

            <div class="tab-panes">
                <?php foreach($content->iframes as $tabbed_content) { ?>
                    <iframe scrolling="no" style="height: <?php echo $tabbed_content->height; ?>" id="tab-content-<?php echo $i; ?>" src="<?php echo $tabbed_content->iFrameUrl; ?>"></iframe>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
