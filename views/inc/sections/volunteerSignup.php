<section class="volunteer-signup">
    <a class="section-anchor" name="become-a-volunteer"></a>

    <div class="container">
        <?php if(isset($content->heading)) { ?>
            <h2><?php echo $content->heading; ?></h2>
        <?php } ?>

        <?php if(isset($content->subheading)) { ?>
            <h4><?php echo $content->subheading; ?></h4>
        <?php } ?>

        <form action="https://hashbrown.sweetsurrender.dk/api/ddc21f7800b4e33b/live/forms/ab50d4eb4089870500e0db34e1cf977f25e67294/submit" method="POST">
            <div class="fields">
                <div class="flex">
                    <div>
                        <label for="name"><?php echo $content->namePlaceholder; ?></label>
                        <input id="name" type="name" name="name" required placeholder="<?php echo $content->namePlaceholder; ?>" />
                    </div>
                    <div>
                        <label for="email"><?php echo $content->emailPlaceholder; ?></label>
                        <input id="email" type="email" name="email" required placeholder="<?php echo $content->emailPlaceholder; ?>" />
                    </div>
                </div>
                <label for="group"><?php echo $content->groupPlaceholder; ?></label>
                <select id="group" name="group" required>
                    <?php foreach($content->groupOptions as $option) { ?>
                        <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                    <?php } ?>
                </select>
                <label for="description"><?php echo $content->descriptionPlaceholder; ?></label>
                <textarea name="description" id="description" required placeholder="<?php echo $content->descriptionPlaceholder; ?>"></textarea>
            </div>
            <input class="btn dark" type="submit" value="<?php echo $content->submitButtonText; ?>" />
        </form>
    </div>
</section>
