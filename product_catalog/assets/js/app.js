$(function() {

	var page = window.location.href.split("/").pop();

	if(page === 'gallery.php') {
		loadGalleryImages();
	}

});


function loadGalleryImages() {

	var dir = "http://localhost:8080/apps/product_catalog/assets/images/gallery/";

	var createImage = function(src, title) {
		var img   = new Image();
		img.src   = src;
		img.alt   = title;
		img.title = title;
		return img; 
	};

	$.ajax({
	    url : dir,

	    success: function (data) {
	    	var images = [];
	    	//console.log($(data).find("a"));

	        $(data).find("a").attr("href", function (i, val) {
	            if( val.match(/\.(jpe?g|png|gif)$/) ) { 
	            	images.push(createImage("assets/images/gallery/" + val, "foo title"));
	            } 
	        });
	        
	        var i = 0;
	        var l = images.length;

        	setInterval(function() {
        		if(i < l) {
	        		$("#gallery_img_wrapper").append( images[i] ).children(":last").hide().fadeIn(1000);
	        		i++;
	        	}
        	}, 2000);
        	  
	    }
	});

}//end function