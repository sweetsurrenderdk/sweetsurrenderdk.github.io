<section class="quotes">
    <div class="container">
        <h2><?php echo $content->heading; ?></h2>

        <?php foreach($content->quotes as $quote) { ?>
            <div class="quote">
                <p class="quote-text">&ldquo;<?php $quote->text; ?>&rdquo;</p>
                <h3 class="quote-name">- <?php $quote->name; ?></h3>
            </div>
        <?php } ?>
    </div>
</section>
