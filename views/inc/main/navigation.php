<?php

if($page->language == 'da') {
    $home_url = '/da/hjem/';
    $opposite_language = 'en';
    $top_text = 'Sommerlukket fra 7. juli til og med 4. august'
} else {
    $home_url = '/en/home/';
    $opposite_language = 'da';
    $top_text = 'Summer closed from July 7th to August 4th'
}

$all_pages = HashBrown\get_all_contents();

usort($all_pages, function($a, $b) {
    $a_order = 0;
    $b_order = 0;
    
    if(isset($a->navOrder)) { $a_order = $a->navOrder; }
    if(isset($b->navOrder)) { $b_order = $b->navOrder; }

    if($a_order < $b_order) { return -1; }
    if($a_order > $b_order) { return 1; }

    return 0;
});

foreach($all_pages as $p) { 
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
                <?php foreach($all_pages as $p) { ?> 
                    <?php if(!isset($p->showInNav) || $p->language !== $page->language) { continue; } ?>
                
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
<div style="position: fixed; width: 100%; background-color: #FFF; z-index: 50; background-color: yellow; font-size: large; font-weight: bold; text-align: center;">{{ top_text }}</div>
<button class="backdrop" onclick="closeWidgets();"></button>
