<!DOCTYPE html>

<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- SEO -->
        <meta name="description" content="<?php echo esc_attr( stripslashes(get_option('niteoCS_descr', 'Just another Coming Soon Page')) ); ?>">
        <title><?php echo esc_html( stripslashes(get_option('niteoCS_title', get_bloginfo('name').' is coming soon!')) ); ?></title>

        <?php
        $themeslug = 'eclipse';
        $ver = $this->cmp_theme_version($themeslug);

        //include theme defaults
        if ( file_exists(dirname(__FILE__).'/'.$themeslug.'-defaults.php') ) {
            require ( dirname(__FILE__).'/'.$themeslug.'-defaults.php' );
        } 

        // render SEO
        if ( method_exists ( $html, 'cmp_get_seo' ) ) {
            echo $html->cmp_get_seo();
        }

        // render google fonts link
        if ( method_exists ( $html, 'cmp_get_fonts' ) ) {
            echo $html->cmp_get_fonts( $heading_font, $content_font );
        }

        // calculate colors
        $active_color_dark      = $this->hex2hsl( $active_color, '20' );
        $font_color_light       = $this->hex2hsl( $font_color, '60' );
        $font_color_dark        = $this->hex2hsl( $font_color, '-20' );

        // get global settings
        $counter            = get_option('niteoCS_counter', '1');
        $counter_date       = get_option('niteoCS_counter_date', time()+86400);
        $countdown_action   = get_option('niteoCS_countdown_action', 'no-action');

        if ( get_option('niteoCS_translation') ) {
            $translation    = json_decode( get_option('niteoCS_translation'), true );
            $scroll         = $translation[9]['translation'];
        } else {
            $scroll         = 'Scroll';
        } 

        ?>
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo $this->cmp_themeURL($themeslug) . $themeslug.'/style.css?v='.$ver;?>" type="text/css" media="all">
        
        <style>
            body,input, select, textarea, button {font-family:'<?php echo esc_attr( $content_font['family'] );?>', 'sans-serif';color:<?php echo esc_attr( $font_color ); ?>;}
            input {font-family: <?php echo esc_attr( $content_font['family'] );?>, 'fontAwesome';}
            body {font-size:<?php echo esc_attr( $content_font['size'] );?>px;line-height: <?php echo esc_attr( $content_font['line-height'] );?>; letter-spacing: <?php echo esc_attr( $content_font['spacing'] );?>px; font-weight:<?php echo esc_attr($content_font_style['0']);?>;<?php echo isset($content_font_style['1']) ? 'font-style: italic;' : 'font-style: normal;';?>; }
            h1,h2,h3,h4,h5,h6, label {font-family:'<?php echo esc_attr( $heading_font['family'] );?>', 'sans-serif';}
            a {color:<?php echo esc_attr( $font_color ); ?>;}
            input[type="email"], input[type="text"], .input-icon:before{color: <?php echo esc_attr( $font_color_dark );?>;}
            input[type="email"], input[type="text"] {background-color: <?php echo esc_attr( $font_color_light );?>;}
            input[type="submit"] {background-color: <?php echo esc_attr( $active_color ); ?>;}
            input[type="submit"]:hover {background-color: <?php echo esc_attr( $active_color_dark ); ?>;}
            .counter-wrap {background-color:<?php echo esc_attr( $active_color );?>;}
            .counter-wrap p {color: <?php echo esc_attr( $font_color_light ); ?>;}
            .social-list a {background-color: <?php echo esc_attr( $font_color_light ); ?>;}
            .social-list a:hover {background-color: <?php echo esc_attr( $active_color ); ?>;}
            .extended-footer {background-color: <?php echo esc_attr( $font_color_light ); ?>;}
            .inner-content h1,.inner-content h2,.inner-content h3,.inner-content h4,.inner-content h5,.inner-content h6, .text-logo-wrapper, label {font-size:<?php echo esc_attr( $heading_font['size'] / $content_font['size'] );?>em;letter-spacing: <?php echo esc_attr( $heading_font['spacing'] );?>px; font-weight:<?php echo esc_attr($heading_font_style['0']);?>;<?php echo isset($heading_font_style['1']) ? 'font-style: italic;' : 'font-style: normal;';?>; }
        </style>

        <?php 
        // render custom CSS 
        if ( method_exists ( $html, 'cmp_get_custom_css' ) ) {
            echo $html->cmp_get_custom_css();
        } 

        // render header javascripts
        if ( method_exists ( $html, 'cmp_head_scripts' ) ) {
            $html->cmp_head_scripts();
        } 
        
        // echo pattern copyright
        if ( $banner_type == 3 ) {
             echo '<!-- Background pattern from Subtle Patterns --!>';
        } 

        ?>

    </head>

    <body id="body">
        <!-- <div class="header-overflow"> -->
            <div id="background-wrapper">
                <?php 
                if ( method_exists ( $html, 'cmp_background' ) ) {
                    echo $html->cmp_background( $banner_type, $themeslug );

                }
                ?>

                <div class="header-content">
                    <?php
                    // display logo
                    if ( method_exists ( $html, 'cmp_logo' ) ) {
                        echo $html->cmp_logo( $themeslug );
                    } 
                    
                    // display body title
                    if ( method_exists ( $html, 'cmp_get_title' ) ) {
                        echo $html->cmp_get_title( );
                    } 
                    ?>
                </div>

                <div id="scroll" class="scroll-icon">
                  <div></div>
                  <p><?php echo esc_html( $scroll );?></p>
                </div>
            </div>
        <!-- </div> -->

        <div id="content" class="content">

            <div class="inner-content">
                <?php 
                // display counter
                if ( $counter == '1') {
                    $counter_heading    = get_option('niteoCS_counter_heading', 'STAY TUNED, WE ARE LAUNCHING SOON...');

                    if ( get_option('niteoCS_translation') ) {
                        $translation    = json_decode( get_option('niteoCS_translation'), true );
                        $seconds        = $translation[0]['translation'];
                        $minutes        = $translation[1]['translation'];
                        $hours          = $translation[2]['translation'];
                        $days           = $translation[3]['translation'];
                    } else {
                        $seconds        = 'seconds';
                        $minutes        = 'minutes';
                        $hours          = 'hours';
                        $days           = 'days';
                    } 

                    if ( $counter_heading != '' ) { ?>
                        <h2><?php echo esc_html( $counter_heading );?></h2>
                        <?php 
                    } ?>

                    <div id="counter" data-date="<?php echo esc_attr($counter_date);?>">
                        <div class="counter-wrap">
                            <div class="inner-counter">
                                <span id="counter-day">00</span>
                                <p><?php echo esc_html($days);?></p>
                            </div>
                        </div>

                        <div class="counter-wrap">
                            <div class="inner-counter">
                            <span id="counter-hour">00</span>
                            <p><?php echo esc_html($hours);?></p>
                            </div>
                        </div>

                        <div class="counter-wrap">
                            <div class="inner-counter">
                            <span id="counter-minute">00</span>
                            <p><?php echo esc_html($minutes);?></p>
                            </div>
                        </div>

                        <div class="counter-wrap">
                            <div class="inner-counter">
                            <span id="counter-second">00</span>
                            <p><?php echo esc_html($seconds);?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                // display body content
                if ( get_option('niteoCS_body') != '' ) { ?>
                    <div class="content-body">             
                        <?php
                        if ( method_exists ( $html, 'cmp_get_body' ) ) {
                            echo $html->cmp_get_body();
                        } 
                        ?>     
                    </div>
                    <?php 
                }       

                // display subscribe form
                if ( method_exists ( $html, 'cmp_subscribe_form' ) ) {
                    echo $html->cmp_subscribe_form( );
                } ?>


             </div>

            <footer>
                <?php 

                if ( $contact_content != ''
                    || $contact_title != ''
                    || $contact_email != ''
                    || $contact_phone != '' )
                { ?>
                    <div class="extended-footer">

                        <?php if ( $contact_content != '' ): ?>
                            <p><?php echo esc_html($contact_content);?></p>
                        <?php endif;?>

                        <div class="quick-contacts<?php echo ($contact_content == '') ? '' : ' float-right';?>">
                            <?php if ( $contact_title != '' ): ?>
                                <h4><?php echo esc_html($contact_title);?></h4>
                            <?php endif;?>

                            <?php if ( $contact_email != '' ): ?>
                                <p><?php echo antispambot(esc_html($contact_email));?></p>
                            <?php endif;?>

                            <?php if ( $contact_phone != '' ): ?>
                                <p><?php echo esc_html($contact_phone);?></p>
                            <?php endif;?>                            

                        </div>

                    </div>

                    <?php 
                } 

                if ( method_exists ( $html, 'cmp_get_copyright' ) ) {
                    echo $html->cmp_get_copyright();
                } ?>

                <div class="social-wrapper<?php echo (get_option('niteoCS_copyright') === '') ? '' : ' float-right';?>">
                    <?php 
                    // display social icons
                    if ( method_exists ( $html, 'cmp_social_icons' ) ) {
                        echo $html->cmp_social_icons( $mode = 'icon', $title = false );
                    } ?>
                </div>

            </footer>

        </div>


        <?php 
        // render footer javascripts
        if ( method_exists ( $html, 'cmp_javascripts' ) ) {
            $html->cmp_javascripts( $banner_type, $themeslug );
        } 

        if ( $counter == '1') { ?>
            <script>
            // Set the date we're counting down to
            var counter = document.getElementById('counter');
            var unixtime = counter.getAttribute('data-date');
            var date = new Date(unixtime*1000);
            var countDownDate = new Date(date).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                var now = new Date().getTime();
                
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (days < 10) {
                    days = '0' + days;
                }
                if (hours < 10) {
                    hours = '0' + hours;
                }
                if (minutes < 10) {
                    minutes = '0' + minutes;
                }
                if (seconds < 10) {
                    seconds = '0' + seconds;
                }
                if (distance >= 0) {
                    document.getElementById('counter-day').innerHTML = days;
                    document.getElementById('counter-hour').innerHTML = hours;
                    document.getElementById('counter-minute').innerHTML = minutes;
                    document.getElementById('counter-second').innerHTML = seconds;   
                }

                <?php 
                if ( $countdown_action != 'no-action' && $countdown_action != 'display-text') { ?>

                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        window.location.reload();
                    }
                    <?php
                } ?>

            }, 1000);
            </script>
            <?php 
        } ?>

        <!-- scrolling -->
        <script>

            var scrollButton = document.getElementById('scroll');
            var body = document.getElementById('body');

            //adding the event listerner for Mozilla
            if( window.addEventListener ) {
                // document.addEventListener('DOMMouseScroll', scrolled, false);
                document.addEventListener('DOMMouseScroll', scrolled, false);
                document.addEventListener('scroll', scrolled, false);
            }

            //for IE/OPERA etc
            document.onmousewheel = scrolled;

            // scroll on click
            scrollButton.onclick = function(event) {
                 scrolledClick();
            };


            function scrolled(e) {
                var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
                 if (  scrollTop  >  0 ) {
                    body.classList.add('open');

                } else if ( scrollTop < 1 ){
                    body.classList.remove('open');
                }
            }

            function scrolledClick() {
                body.classList.add('open');
            }

        </script>
    </body>
</html>
