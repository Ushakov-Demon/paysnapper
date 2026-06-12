jQuery(document).ready(function(){
	var name;
	var phone;
	'use strict';
	'esversion: 6';

	jQuery(document).on("scroll", window, function(){
	     el = jQuery('.possibilities-section')

			if( !el.length ) {
				return;
			}

			to = el.offset().top
			tp = jQuery(window).scrollTop()
			h = jQuery(window).height()

			dh = tp + h
			
			d= tp-to
			if ( dh - to > 500 && tp - to < 500 ){
				jQuery('.overview').removeClass('over-hidden')
				console.log('true')
			}
			else if(to < tp || to > dh) {
				jQuery('.overview').addClass('over-hidden')
				
			}
	})

	jQuery('#contactus').on('click',function(){
		name = jQuery('#name').val();
		phone = jQuery('#phone').val();
		
		if (name !="" && name.length > 3)
		{
			if (phone !="" && phone.length > 3){
				console.log(name)
				action = "send"
				jQuery.ajax({
				
				url:my_ajax_obj.ajaxurl,
				type:'POST',
				data:{'name':name,'phone':phone,'type':'send','action':'my_ajax_request', 'security': my_ajax_obj.nonce },
				
				success: function(data){
					
					if (data ="success")
					{

						jQuery('input').val('');
					}
				},
				error: function() {
					alert ('К сожалению, возникла непредвиденная ошибка. Приносим извинения');
				}

				}).done(function(data) {
            
            
       			 });

			}
		}

	})

	jQuery('.light-info-tabs').find('.block4-right-button').on('click', function(e){
		if ( jQuery(this).hasClass('active-bulk') ){
			return false
		}

		e.preventDefault();
		let n = jQuery(this).data('name')
		let activeBtn = jQuery(this).parent().find('.block4-right-button.active-bulk');
		let activeImage = jQuery('.block4-middle img.'+activeBtn.data('name'));
		let targetImage = jQuery('.block4-middle img.'+n);
		activeBtn.removeClass('active-bulk')
		jQuery('.block-4-2 p.second.active').removeClass('active');
		jQuery('.block-4-2 p.second.'+n).addClass('active');
		jQuery(this).addClass('active-bulk')
			activeImage.addClass('hidden').animate( {opacity:0},200, function(){
				targetImage.removeClass( 'hidden' ).animate( {opacity:1},1000, function(){})
			})
	})

	jQuery( '.possibilities-section' ).find('.cap-btn').on('click', function(e){
		if ( jQuery(this).hasClass( 'solution-active' ) ) {
			return
		}
		e.preventDefault();

		n = jQuery(this).data('name');
		let parent = jQuery( this ).closest( '.block5-left' );
		let targetCont = parent.find( '.cap-content.'+n );
		jQuery('.cap-btn.solution-active').removeClass('solution-active')
		jQuery(this).addClass('solution-active')
		parent.find( '.cap-content.active' ).removeClass( 'active' )
		targetCont.addClass( 'active' )
	})

	jQuery('a[href*="#"]').click(function(e) {
	  var id = jQuery(this).attr('href');
	  var $id = jQuery(id);
	  if ($id.length) {
	    e.preventDefault();
	    jQuery('html, body').animate({ scrollTop: $id.offset().top }, 'slow');
	  }
	});

	// Dropdown: toggle on parent link click, prevent redirect
	jQuery(document).on('click', '.navbar-nav .nav-item.dropdown > .nav-link', function(e) {
		e.preventDefault();
		var $item = jQuery(this).closest('.nav-item.dropdown');
		var wasOpen = $item.hasClass('open');
		jQuery('.nav-item.dropdown.open').removeClass('open');
		if (!wasOpen) {
			$item.addClass('open');
		}
	});

	// Close dropdown when clicking outside
	jQuery(document).on('click', function(e) {
		if (!jQuery(e.target).closest('.nav-item.dropdown').length) {
			jQuery('.nav-item.dropdown.open').removeClass('open');
		}
	});

})