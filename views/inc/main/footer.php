<?php

$settings = HashBrown\get_content_by_id('7aa545d38aa1316c', $page->language);

if($page->language == 'da') {
    $str_health = 'Se Fødevarestyrelsens smiley-rapporter';
    $str_putaitu = 'Website doneret af <a href="http://putaitu.com/da/hjem" target="_blank">Putaitu Productions</a> og administreret med <a href="http://hashbrown.rocks" target="_blank">HashBrown CMS</a>';

} else {
    $str_health = 'Health inspection reports from Fødevarestyrelsen';
    $str_putaitu = 'Website donated by <a href="//putaitu.com" target="_blank">Putaitu</a> and managed with <a href="//hashbrown.rocks" target="_blank">HashBrown CMS</a>';

}

?>

<footer>
    <div class="info">
        <div class="container">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2250.2855186755937!2d12.548044016054762!3d55.66663500610183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465253767210b82f%3A0x4bfa99a22f50d891!2sCaf%C3%A9+Sweet+Surrender!5e0!3m2!1sen!2sdk!4v1467887812431"
                    frameborder="0"
                    style="border:0" allowfullscreen></iframe>
            </div>
            <div class="text">
                <p class="name">Café Sweet Surrender</p>
                <p class="address"><span class="fa fa-map-marker"></span>Dybbølsgade 49<br />1721 København V</p>
                <p class="telephone"><span class="fa fa-phone"></span><a href="tel:+4521970749">+45 21 97 07 49</a></p>
                <div class="opening-hours">
                    <span class="fa fa-clock-o"></span>
                    <table>
                        <?php if(isset($settings->openingHours)) { ?>
                            <?php foreach($settings->openingHours as $array_item) { ?>
                                <?php $line = $array_item->value; ?>

                                <?php if(isset($line->hours) && $line->hours) { ?>
                                    <tr>
                                        <td class="label"><?php echo $line->weekdays; ?></td>
                                        <td class="hours"><?php echo $line->hours; ?></td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="2"><?php echo $line->weekdays; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
                <div class="social-links">
                    <span class="fa fa-share-alt"></span>
                    <a href="http://www.facebook.com/sweetsurrenderdk">
                        <span class="fa fa-facebook-square"></span>
                    </a>
                    <a href="https://twitter.com/CafeCph">
                        <span class="fa fa-twitter-square"></span>
                    </a>
                    <a href="https://www.instagram.com/cafesweetsurrender/">
                        <span class="fa fa-instagram"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="copyright">
        <div class="container">
            <img class="copyright-logo" src="/public/img/logo.png" alt="Sweet Surrender logo" />
            <p>Copyright 2013-2016 Café Sweet Surrender</p>
            <a href="http://www.findsmiley.dk/da-DK/Searching/DetailsView.htm?virk=521348" target="_blank"><?php echo $str_health; ?></a>
            <br />
            <br />
            <p><?php echo $str_putaitu; ?></p>
        </div>
    </div>
</footer>
