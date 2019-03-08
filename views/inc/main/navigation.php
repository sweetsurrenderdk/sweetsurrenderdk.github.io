<?php

if($page->language == 'da') {
    $home_url = '/da/hjem/';
    $opposite_language = 'en';
} else {
    $home_url = '/en/home/';
    $opposite_language = 'da';
}

foreach(HashBrown\get_all_contents as $p) { 
    if($p->language === $opposite_language & $p->id === $page->id) {
        $opposite_page_url = $p->url;

    } else if($p->id === '75fb3bd6e8d858ca23300c720820d60467289a46' && $p->language === $page->language) { 
        $about_page_url = $p->url;
    }
}

?>

<nav>
    <div class="container">
    <a class="nav-brand" href="<?php echo $home_url; ?>">
            <img src="/public/img/logo.png" alt="Sweet Surrender logo" />
        </a>
       
        <div class="pages-container">
            <div class="pages">
                <?php foreach(HashBrown\get_all_contents as $p) { ?> 
                    <?php if(!$p->showInNav) { continue; } ?>
                
                    <a href="<?php echo $p->url; ?>"><?php echo $p->title; ?></a>
                <?php } ?>
            </div>
        </div>

        <div class="widgets">
            <div class="widgets-position-wrapper">
                <a href="<?php echo $opposite_page_url; ?>" style="background-image: url('/public/img/<?php echo $opposite_language; ?>.jpg')"></a>
                <a href="<?php echo $about_page_url; ?>#tabbed-iframes">
                    <img src="/public/img/icon-volunteer.png" alt="Volunteer" />
                </a>
                <button class="btn-toggle-calendar" onclick="toggleWidget('calendar')">
                    <span class="fa fa-calendar"></span>
                    <div class="icon-calendar-new-events"></div>
                </button>
                <button class="btn-toggle-menu" onclick="toggleWidget('menu');">
                    <span class="fa fa-bars"></span>
                </button>
            </div>
        </div>
    </div>
</nav>
<div class="calendar-container">
    <div class="calendar-events">
        <div class="calendar-event" data-id="">
            <div class="calendar-event-header">
                <img class="cover" />
            </div>
            <div class="calendar-event-body">
                <p class="name">Event name</p>
                <p class="description">Description</p>
                <a target="_blank" href="https://www.facebook.com/events/" class="fb-link"><span class="fa fa-facebook-square"></span>View event</a>
                <p class="date">2016.01.01</p>
                <p class="hours">12:00 - 14:00</p>
            </div>
        </div>
    </div> 
</div>
<button class="backdrop" onclick="closeWidgets();"></button>
