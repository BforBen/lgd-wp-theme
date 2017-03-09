<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<a name="content-start"></a>
<main>
    <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
    <section id="home__intro">
        <div class="row">
            <div class="small-12 medium-8 column home-intro">
                <h1><?php the_title();?></h1>
                <?php the_content();?>
            </div>
            <div class="small-12 medium-4 column popular-links">
                <h2>Popular links</h2>
                <?php the_field('popular_links'); ?>
            </div>
        </div>
    </section>
    <?php endwhile; endif;?>
    <section id="home__whats-new">
        <div class="row">
                <?php
                // query the first 6 posts within 'news' category
                $the_query = new WP_Query( array( 'category_name' => 'news', 'posts_per_page' => '6' ) );
                // loop through all posts
                $i = 1;
                $news_list = '';
                if ( $the_query->have_posts() ) : while ($the_query->have_posts()) : $the_query->the_post();
                    // if the first item, display as feature
                    if ($i == '1') : ?>
                        <div class="small-12 medium-7 column feature-news">
                            <?php the_post_thumbnail(); ?>
                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <?php the_excerpt();?>
                            <span class="small-date"><?php the_date();?></span>
                        </div>
                    <?php else :
                    // else create $news_list variable with all other posts in the loop
                    $news_list = '
                        <li>
                            <h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>
                            <span class="small-date">'.get_the_date().'</span>
                        </li>
                    '.$news_list;
                    endif;
                    $i++;
                endwhile; endif;
                ?>
                <div class="small-12 medium-5 column news-list">
                    <h2>What's new in LocalGov</h2>
                    <ul>
                        <?php
                        // display all other posts
                        echo $news_list;
                        ?>
                    </ul>
                </div>
        </div>
    </section>

    <section id="home__service-banners">
        <div class="row">
            <div class="small-12 medium-4 column">
                <div class="service-banner">
                    <div class="service-banner-image">
                        <img src="http://placehold.it/450x200">
                    </div>
                    <div class="service-banner-content">
                        <h2>Digital service standard</h2>
                        <ul>
                            <li><a href="#">View the standard</a></li>
                            <li><a href="#">Guidance notes</a></li>
                            <li><a href="#">Case studies</a></li>
                            <li><a href="#">Background</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="service-banner">
                    <div class="service-banner-image">
                        <img src="http://placehold.it/450x200">
                    </div>
                    <div class="service-banner-content">
                        <h2>Regional peer groups</h2>
                        <ul>
                            <li><a href="#">Current peer groups</a></li>
                            <li><a href="#">Next events</a></li>
                            <li><a href="#">Set up a group</a></li>
                            <li><a href="#">Sponsor and event</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="service-banner">
                    <div class="service-banner-image">
                        <img src="http://placehold.it/450x200">
                    </div>
                    <div class="service-banner-content">
                        <h2>LocalGovMakers</h2>
                        <ul>
                            <li><a href="#">View the standard</a></li>
                            <li><a href="#">Guidance notes</a></li>
                            <li><a href="#">Case studies</a></li>
                            <li><a href="#">Background</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="home__digital-voice">
        <div class="container">
            <div class="small-12 column digital-voice-title">
                <h2>LocalGov Digital Voice</h2>
                <p>Your thoughts, your challenges, your successes and your work</p>
            </div>
            <div class="small-12 column digital-voice-listings">
                <ul>
                    <li>
                        <h3><a href="#">Voice article title text</a></h3>
                        <p>Author name</p>
                        <span class="small-date">12 February 2017</span>
                    </li>
                    <li>
                        <h3><a href="#">Voice article title text</a></h3>
                        <p>Author name</p>
                        <span class="small-date">12 February 2017</span>
                    </li>
                    <li>
                        <h3><a href="#">Voice article title text</a></h3>
                        <p>Author name</p>
                        <span class="small-date">12 February 2017</span>
                    </li>
                    <li>
                        <h3><a href="#">Voice article title text</a></h3>
                        <p>Author name</p>
                        <span class="small-date">12 February 2017</span>
                    </li>
                    <li>
                        <h3><a href="#">Voice article title text</a></h3>
                        <p>Author name</p>
                        <span class="small-date">12 February 2017</span>
                    </li>
                    <li>
                        <h3><a href="#">Voice article title text</a></h3>
                        <p>Author name</p>
                        <span class="small-date">12 February 2017</span>
                    </li>
                </ul>
                <div class="digital-voice-button">
                    <a href="#" class="button">view all blog posts</a>
                    <a href="#" class="secondary">Submit your blog</a>
                </div>
            </div>
        </div>
    </section>

    <section id="home__event-banners">
        <div class="row">
            <div class="small-12 medium-4 column">
                <div class="event-banner">
                    <div class="event-banner-image">
                        <img src="http://placehold.it/450x200">
                    </div>
                    <div class="event-banner-content">
                        <h2>LocalGovCamp</h2>
                        <p>Some intro text to go here</p>
                        <hr>
                        <p><strong>Next event: 17 January 2017</strong></p>
                        <a href="#">View timetable and notes</a>
                        <a href="#" class="button">Sign up for event</a>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="service-banner">
                    <div class="service-banner-image">
                        <img src="http://placehold.it/450x200">
                    </div>
                    <div class="event-banner-content">
                        <h2>LocalGovCamp</h2>
                        <p>Some intro text to go here</p>
                        <hr>
                        <p><strong>Next event: 17 January 2017</strong></p>
                        <a href="#">View timetable and notes</a>
                        <a href="#" class="button">Sign up for event</a>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="service-banner">
                    <div class="service-banner-image">
                        <img src="http://placehold.it/450x200">
                    </div>
                    <div class="event-banner-content">
                        <h2>LocalGovCamp</h2>
                        <p>Some intro text to go here</p>
                        <hr>
                        <p><strong>Next event: 17 January 2017</strong></p>
                        <a href="#">View timetable and notes</a>
                        <a href="#" class="button">Sign up for event</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>
<?php get_footer();
