jQuery(function($) {
        
    /* Mobile nav toggle */
    $(".mobile-nav-toggle").on("click", function(e) {
		
		if ($("body").hasClass("nav-open")) {
			$(".mobile-nav-container").animate({right:"-285px"}, 200);
            $("body").animate({right:"0px"}, 200);
		}
		else {
            $(".mobile-nav-container").animate({right:"0px"}, 200);
            $("body").animate({right:"285px"}, 200);
		}
        
		$("body").toggleClass("nav-open");
        
        e.preventDefault();
		e.stopPropagation();
		
    });
    
    
    $(".mobile-nav-container .close span").on("click", function(e) {
        
        $(".mobile-nav-container").animate({right:"-285px"}, 200);
        $("body").animate({right:"0px"}, 200);
		$("body").removeClass("nav-open");
        
        e.preventDefault();
		e.stopPropagation();
        
    });
	
	
	//Easy Expandable Nav with sub-menu support :)
	$(".menu-item-has-children").on("click", function(e) {
		
        e.preventDefault();
		e.stopPropagation();
        
        //not on desktops
        if ($(window).width() >= 1025) return;
        
        $(this).toggleClass("open");
        $(this).children(".sub-menu").slideToggle("fast");
       
        
	});
	
	$(".menu-item a").on("click", function(e) {
        
		e.preventDefault();
		e.stopPropagation();
        
        /* if this is just a # then expand the children */
        if ($(this).attr("href") == "#") {
            $(this).parent().toggleClass("open");
            $(this).next(".sub-menu").slideToggle("fast");
        } else if ($(this).attr("target") == "_blank") { 
            window.open($(this).attr("href"), "", "");
            return false;
        } else {
            window.location.href=$(this).attr("href");		
        }
	});
    
    
      
    //close nav if it"s open, and they click on the body
    $("body").on("click", function() {
        if ($("body").hasClass("nav-open")) {
            
            $(".mobile-nav-container").animate({right:"-285px"}, 200);
            $("body").animate({right:"0px"}, 200);
            $("body").removeClass("nav-open");
            
        }
    });
    

    
       

    //Toggle the top nav sticky class
	$(window).scroll(function() {
        
		if (getScrollingElement().scrollTop > 1) {
			$("#masthead").addClass("sticky");
		}else {
			$("#masthead").removeClass("sticky");
		}
        
	});

	//After a refresh.... the browser may already be scrolled to it"s previous position
	if ( getScrollingElement().scrollTop > 1) {
        $("#masthead").addClass("sticky");    
    }
    
    
});


/* Helps older Safari browsers */
function getScrollingElement() {
  if (document.scrollingElement) {
    return document.scrollingElement;
  }

  const docElement = document.documentElement;
  const docElementRect = docElement.getBoundingClientRect();

  return {
    scrollHeight: Math.ceil(docElementRect.height),
    scrollTop: Math.abs(docElementRect.top)
  };
    
}


// Adds a "webp" or "nowebp" class to the body tag which allows you to have specific webp and non-webp CSS backgrounds.
function check_webp_feature(A){var e=new Image;e.onload=function(){e.width>0&&e.height;document.body.className+=" webp"},e.onerror=function(){document.body.className+=" nowebp"},e.src="data:image/webp;base64,"+{lossy:"UklGRiIAAABXRUJQVlA4IBYAAAAwAQCdASoBAAEADsD+JaQAA3AAAAAA",lossless:"UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==",alpha:"UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAARBxAR/Q9ERP8DAABWUDggGAAAABQBAJ0BKgEAAQAAAP4AAA3AAP7mtQAAAA==",animation:"UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA"}[A]}check_webp_feature("lossy");