This theme includes support for Woocommerce.

To install:

Step 1. `git clone https://github.com/tex0gen/bootstrap4-wordpress-theme.git --recurse-submodules`

Step 2. Run `npm install` inside the theme directory.

Step 3. Install and run `gulp`.

Step 3. Install Advanced Custom Fields Pro plugin. https://www.advancedcustomfields.com/pro/

Step 4. Activate Theme.

Step 5. Start developing.

## Features
- Uses Bootstrap 4
- Gulp for building, minifying and tidying SASS. Also minifies and concatenates JS.
- Add in your live URL to `/inc/settings/other/site_opts.php` to prevent database pushes from dev to live turning off indexing.
- Woocommerce support built in.
- Woocommerce templates untouched. Bootstrap classes added to woocommerce via the `@extend` directive so you can update your woocommerce trouble free.
- Easily manipulate woocommerce without editing templates in `inc/woocommerce`.
- Pre-built components for use with the ACF Flex Content Editor for maximum flexibility in building pages. Easily modify, extend and remove components.
- Updated often to include more components and features.
- 404 Page.