// Go To Top

		jQuery(document).ready(function() {
			// Show or hide the sticky footer button
			jQuery(window).scroll(function() {
				if (jQuery(this).scrollTop() > 200) {
					jQuery('.go-top').fadeIn(200);
				} else {
					jQuery('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			jQuery('.go-top').click(function(event) {
				event.preventDefault();
				
				jQuery('html, body').animate({scrollTop: 0}, 300);
			})
		});

// Pullquote Functionality

(function( jQuery ){
	
	var PULLQUOTE = 'data-pullquote';
	
	jQuery('[' + PULLQUOTE + ']').each(function(){
	
		var jQueryparent = jQuery(this),
	      jQueryquote = jQueryparent.find( jQueryparent.data('pullquote') );
		
		if ( jQueryquote.length > 0 )
		{
			jQueryparent
				.attr( PULLQUOTE, jQueryquote.eq(0).text() )
				.addClass( 'has-pullquote ');
		}
		
	});
	
}( jQuery ));

	jQuery(function() {
	   jQuery('ul.dropdown').hover( function(){
	      jQuery(this).parent().addClass("hover");
	   },
	   function(){
	      jQuery(this).parent().removeClass("hover");
	   });
	});

	new UISearch( document.getElementById( 'sb-search' ) );

	jQuery('#masonryContainer').masonry({
		  columnWidth: masonryContainer.querySelector('.grid-sizer'),
		  itemSelector: '.brick'
		  
		});

	jQuery('#masonryContainer').masonry({
		  columnWidth: masonryContainer.querySelector('.product-sizer'),
		  itemSelector: '.brick_product'
		  
		});
				
	new AnimOnScroll( document.getElementById( 'masonryContainer' ), {
			minDuration : 0.4,
			maxDuration : 0.7,
			viewportFactor : 0.2
	} );
	
		