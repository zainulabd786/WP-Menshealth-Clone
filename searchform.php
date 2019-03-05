<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( twentyseventeen_unique_id( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<div id="searchoverlay" class="search-overlay">
    <div class="search-overlay-inner">
      <a href="#">
        <span class="search-overlay-close-button">
          <i class="fas fa-times"></i>
        </span>
      </a>
      <form class="search-form search-overlay-form" action="/search/">
        <input type="search" id="search-input" class="search-input" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
        <label class="search-label" for="search-input">Type keyword(s) to search</label>
      </form>
      <div class="search-overlay-autosuggest">
        <ul class="search-overlay-autosuggest-list">
        </ul>
      </div>
    </div>
  </div>
</form>
