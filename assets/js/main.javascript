(function( $ ) {
    setNavProps();
  // On scroll, we want to stick/unstick the navigation.
		$( window ).on( 'scroll', function() {
			adjustScrollClass();
		});

		// Also want to make sure the navigation is where it should be on resize.
		$( window ).resize( function() {
			setNavProps();
			setTimeout( adjustScrollClass, 500 );
		});

    $(".open-overlay").click(function(){
      $($(this).attr("href")).toggleClass("show");
      return false;
    });

    $("#main-nav .navbar-toggle").click(function(){
        navigationFixedClass = 'scrolled-nav';
        $navigation.toggleClass( navigationFixedClass );
    });

    function adjustScrollClass() {
      navigationFixedClass = 'scrolled-nav';
      if ( $( window ).scrollTop() >= navigationOuterHeight ) {
        $navigation.addClass( navigationFixedClass );
        } else {
            $navigation.removeClass( navigationFixedClass );
        }

    }
    function setNavProps(){
      $navigation = $("#main-nav");
      navigationHeight      = $navigation.height();
  		navigationOuterHeight = $navigation.outerHeight();
    }
})( jQuery );
