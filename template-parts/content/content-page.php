<?php
  if( is_singular() ):
  the_title( '<h1 class="entry-title">','</h1>' );
  else:
    the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink( ) ) ),'</a></h2>' );
  endif;
  the_content();