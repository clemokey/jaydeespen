$(document).ready(function(){
	
	$(".menu-area").sticky({
		topSpacing:0, 
	});
	
	$("body").scrollspy({
		target: ".navbar-collapse", 
		offset: 95, 
	});
	
    var userFeed = new Instafeed({
  	get: 'user',
  	userId: '9667217165',
  	// clientId: '924f677fa3854436947ab4372ffa688d',
  	accessToken: '9667217165.1677ed0.b63cce6259c2402885f322eb947347fa',
  	resolution: 'standard_resolution',
  	template: '<a href="{{link}}" ><img src="{{image}}" /><div class="instagram-icon"><i class="fa fa-instagram"></i></div></a>',
  	sortBy: 'most-recent',
  	limit: 4,
  	links: false
});
userFeed.run();

    
});




// var userFeed = new Instafeed({
//   get: 'user',
//   userId: '9667217165',
  // clientId: '924f677fa3854436947ab4372ffa688d',
//   accessToken: '9667217165.1677ed0.b63cce6259c2402885f322eb947347fa',
//   resolution: 'standard_resolution',
//   template: '<div class=""><a href="{{link}}" target="_blank"><img src="{{image}}" /><div class="instagram-icon"><i class="fa fa-instagram"></i></div></a></div>',
//   sortBy: 'most-recent',
//   limit: 4,
//   links: false
// });
// userFeed.run();

// '<a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a>'