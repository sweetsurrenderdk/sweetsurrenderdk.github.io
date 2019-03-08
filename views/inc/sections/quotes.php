<section class="quotes">
    <div class="container">
        <?php if(isset($content->heading)) { ?>
            <h2><?php echo $content->heading; ?></h2>
        <?php } ?>

        <?php if(isset($content->quotes)) { ?>
            <?php foreach($content->quotes as $array_item) { ?>
                <?php $quote = $array_item->value; ?>

                <div class="quote">
                    <?php if(isset($quote->text)) { ?>
                        <p class="quote-text">&ldquo;<?php echo $quote->text; ?>&rdquo;</p>
                    <?php } ?>
                    <?php if(isset($quote->name)) { ?>
                        <h3 class="quote-name">- <?php echo $quote->name; ?></h3>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>
