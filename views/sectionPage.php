<!DOCTYPE html>
<html>
    <?php include __DIR__ . '/inc/main/head.php'; ?>
    
    <body>
        <?php include __DIR__ . '/inc/main/navigation.php'; ?>

        <div class="page">
            <?php if(isset($page->sections)) { ?>
                <?php foreach($page->sections as $array_item) { ?>
                    <?php HashBrown\render_view(__DIR__ . '/inc/sections/' . $array_item->schemaId . '.php', $array_item->value); ?>
                <?php } ?>
            <?php } ?>

            <?php include __DIR__ . '/inc/main/footer.php'; ?>
        </div>
        
        <?php include __DIR__ . '/inc/main/scripts.php'; ?>
    </body>
</html>
