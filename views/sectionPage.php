<!DOCTYPE html>
<html>
    <?php include './inc/main/head.php'; ?>
    
    <body>
        <?php include './inc/main/navigation.php'; ?>

        <div class="page">
            <?php if(isset($page->sections)) { ?>
                <?php foreach($page->sections as $array_item) { ?>
                    <?php HashBrown\render_view(__DIR__ . '/sections/' . $array_item->schemaId . '.php', $array_item->value); ?>
                <?php } ?>
            <?php } ?>

            <?php include './inc/main/footer.php'; ?>
        </div>
        
        <?php include './inc/main/scripts.php'; ?>
    </body>
</html>
