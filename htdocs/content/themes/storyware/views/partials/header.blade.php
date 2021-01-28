<header class="Header js-StickyHeader Header--sticky">
  <div class="Header-wrap">
    <div class="Header-container Container">
      <a class="Branding Branding--header" href="/" title="{{ get_bloginfo('name') }}" rel="home">
          <img src="{!! get_template_directory_uri() !!}/assets/svg/page-g-wood.svg" alt="{{ get_bloginfo('name') }}">
      </a>
      <nav id="nav-main" class="Nav Nav--main marginT1 marginT0--sm" role="navigation">
        {!! wp_nav_menu(array(
          'container' => false,
          'menu_class' => 'menu',
          'theme_location' => 'main',
          ))
        !!}
      </nav>
    </div>
  </div>
</header>
