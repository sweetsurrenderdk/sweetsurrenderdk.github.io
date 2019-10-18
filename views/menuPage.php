<!DOCTYPE html>
<html>
    <?php include __DIR__ . '/inc/main/head.php'; ?>
    
    <body>
        <?php include __DIR__ . '/inc/main/navigation.php'; ?>

        <?php

        $menu_items = HashBrown\get_content_children($page->id, $page->language);

        $menu_item_tags = [];

        foreach($menu_items as $menu_item) {
            if(!isset($menu_item->tags) || !is_string($menu_item->tags)) { continue; }

            foreach(explode(',', $menu_item->tags) as $menu_item_tag) {
                if(in_array($menu_item_tag, $menu_item_tags)) { continue; }

                array_push($menu_item_tags, $menu_item_tag);
            }
        }

        ?>

        <div class="page menu-page">
            <div class="menu-nav">
                <button class="menu-nav-toggle" onclick="toggleWidget('menu-nav');">
                    <span class="fa fa-th-list"></span>
                </button>

                <div class="menu-items">
                    <?php foreach($menu_item_tags as $menu_item_tag) { ?>
                        <h4><?php echo $menu_item_tag; ?></h4>

                        <?php foreach($menu_items as $menu_item) { ?>
                            <?php if(!isset($menu_item->tags) || !in_array($menu_item_tag, explode(',', $menu_item->tags))) { continue; } ?>

                            <button class="menu-item" data-id="<?php echo $menu_item->id; ?>">
                                <?php if(isset($menu_item->price)) { ?>
                                    <p class="price"><?php echo $menu_item->price; ?> kr.</p>
                                <?php } ?>

                                <?php if(isset($menu_item->title)) { ?>
                                    <p class="title"><?php echo $menu_item->title; ?></p>
                                <?php } ?>
                            </button>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <div class="menu-gallery grid">
                <div class="grid-sizer"></div>
                <?php foreach($menu_items as $menu_item) { ?>
                    <a style="<?php if(isset($menu_item->color)) { echo 'background-color: ' . $menu_item->color . ';'; } ?>" href="#" name="<?php echo $menu_item->id; ?>" onclick="MenuHelper.focusItem('<?php echo $menu_item->id; ?>'); return false;" class="menu-item child-item" data-size="<?php echo isset($menu_item->size) ? $menu_item->size : 0; ?>" id="_<?php echo $menu_item->id; ?>">
                        <?php if(isset($menu_item->image)) { ?>
                            <img src="<?php echo HashBrown\get_media_url($menu_item->image); ?>" class="image" />
                        <?php } ?>

                        <div class="info">
                            <p class="title"><?php echo $menu_item->title; ?></p>
                            <div class="details">
                                <?php if(isset($menu_item->description)) { ?>
                                    <p class="description"><?php echo $menu_item->description; ?></p>
                                <?php } ?>
                                <?php if(isset($menu_item->price)) { ?>
                                    <p class="price"><?php echo $menu_item->price; ?> kr.</p>
                                <?php } ?>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        
        <?php include __DIR__ . '/inc/main/scripts.php'; ?>

        <script>
            var grid = document.querySelector('.grid');
            var masonry = new Masonry(grid, {
                columnWidth: '.grid-sizer'
            });
        </script>
    </body>
</html>
