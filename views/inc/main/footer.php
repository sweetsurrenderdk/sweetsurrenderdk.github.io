<?php

if($page->language == 'da') {
    $str_mon = 'Mandag';
    $str_tue_thu = 'Tirsdag - Torsdag';
    $str_fri = 'Fredag';
    $str_sat_holidays = 'Lørdag og helligdage';
    $str_holidays_close = '(lukket påske, jul og nytår)';
    $str_sun = 'Søndag';
    $str_closed = 'Lukket';
    $str_health = 'Se Fødevarestyrelsens smiley-rapporter';
    $str_putaitu = 'Website doneret af <a href="http://putaitu.com/da/hjem" target="_blank">Putaitu Productions</a> og administreret med <a href="http://hashbrown.rocks" target="_blank">HashBrown CMS</a>';
    $str_easterclosed = 'Påskelukket';
    $str_easterclosed2 = '27/3 til 2/4';

} else {
    $str_mon = 'Monday';
    $str_tue_thu = 'Tuesday - Thursday';
    $str_fri = 'Friday';
    $str_sat_holidays = 'Saturday & holidays';
    $str_holidays_close = '(closed Easter and Christmas)';
    $str_sun = 'Sunday';
    $str_closed = 'Closed';
    $str_health = 'Health inspection reports from Fødevarestyrelsen';
    $str_putaitu = 'Website donated by <a href="http://putaitu.com/en/home" target="_blank">Putaitu Productions</a> and managed with <a href="http://hashbrown.rocks" target="_blank">HashBrown CMS</a>';
    $str_easterclosed = 'Easter closed';
    $str_easterclosed2 = 'March 27th to April 2nd';

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
                        <tr>
                            <td class="label"><?php echo $str_mon; ?></td>
                            <td class="hours">10 - 16</td>
                        </tr>
                        <tr>
                            <td class="label"><?php echo $str_tue_thu; ?></td>
                            <td class="hours">10 - 20</td>
                        </tr>
                        <tr>
                            <td class="label"><?php echo $str_fri; ?></td>
                            <td class="hours">10 - 16</td>
                        </tr>
                        <tr>
                            <td class="label"><?php echo $str_sat_holidays; ?></td>
                            <td class="hours">10 - 16</td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo $str_holidays_close; ?></td>
                        </tr>
                        <tr>
                            <td class="label"><?php echo $str_sun; ?></td>
                            <td class="hours"><?php echo $str_closed; ?></td>
                        </tr>
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