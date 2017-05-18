<?php
if ( have_rows( 'main_content_flex' ) ) {
  while ( have_rows( 'main_content_flex' ) ) { 
    the_row();

    $tmpl_name = str_replace( '_', '-', get_row_layout() );
    get_template_part( 'template-parts/flex/' . $tmpl_name );

  }
}
