![WordPress Plugin: Required WP Version](https://img.shields.io/wordpress/plugin/wp-version/bbpress)
![WordPress Plugin Required PHP Version](https://img.shields.io/wordpress/plugin/required-php/bbpress)
# WordPress API layer for React Assesment Task

[LOGIN TO WORDPRESS](https://course-studio-3849f9.ingress-daribow.easywp.com/admin)

## Overview
This is an API layer using WordPress. It is built for the React assessment task which can be found [here](https://github.com/SebastianOpperman/course-studio-app). It features a clean trimmed WordPress back-end that exposes the data via a custom endpoint. 

I've used zero plugins or extensions and only standard WordPress functionality out of the box.

## Structure

### `functions.php`
I've split up the theme's functions into two files:
- `/helpers/theme-setup.php`: Sets up basic things like scripts and the custom post type for **Athletes**. It also cleans up the WP backend menu.
- `/helpers/endpoint.php`: Uses `WP_Query` to fetch the data, which I format neatly and expose via a custom REST endpoint. This gets consumed by the front-end [app](https://github.com/SebastianOpperman/course-studio-app).

### `index.php`
Here I'm using the theme's front-end to point the user to the actual NEXT.js front-end [here](https://github.com/SebastianOpperman/course-studio-app). The WordPress instance only acts as a CMS to the NEXT.js front-end, so we don't need to do anything else in the theme.