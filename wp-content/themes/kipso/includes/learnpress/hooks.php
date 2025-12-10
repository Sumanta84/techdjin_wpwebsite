<?php
remove_action( 'learn-press/before-main-content', 'learn_press_breadcrumb', 10 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_price', 25 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_buttons', 30 );

remove_action( 'learn-press/content-landing-summary', 'learn_press_course_students', 10 );
remove_action( 'learn-press/content-learning-summary', 'learn_press_course_tabs', 35 );