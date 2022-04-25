$(document).ready(function () {

	$(window).scroll(function () {
		if ($(this).scrollTop() > 1) {
			$('.page-title').addClass("sticky");
		}
		else {
			$('.page-title').removeClass("sticky");
		}
	});
});

// jQuery(document).ready(function($){
// 	if ($(window).width() > 767) {
// 	}
// 	else {
// 	  $('.newNav  ul').hide();
// 	  console.log($('.newNav  ul').hide())
// 	  $('.newNav').has('ul').click(function() {
// 		$('.newNav  ul').css("display", "block !important");	
// 		$(this).toggle();
// 	  });
// 	}
//   });

document.addEventListener('DOMContentLoaded', function(e){


	if(document.querySelectorAll('.home-bktop-btn')[0]) {
		document.querySelectorAll('.home-bktop-btn')[0].addEventListener('click', function (){
			window.scrollTo(0, 0);
		})

	}

	s = localStorage.getItem('search')
	if(s) {
		if(document.querySelectorAll('.search-posts')[0]) {
			document.querySelectorAll('.search-posts')[0].innerHTML = s;

		}
	}


	const navBtn = document.querySelectorAll('.home-header-top-btnNav')[0];
	const windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	if(windowWidth < 500) {
		if(window.location.pathname !== '/') {
			document.querySelectorAll('.home-header-top-back')[0].style.display = 'block'
		}
	}
	const mHeader = document.querySelectorAll('.home-header-top-brand-mobile')[0]

	const mainSearhMClose = document.querySelectorAll('.mobile-search-form-close')[0]
	const mainSearch = document.querySelectorAll('.mobile-main-search')[0]
	const mobileSearchForm = document.querySelectorAll('.home-header-nav-container-mobile-search-form')[0]

	let msf = false
	mainSearch.addEventListener('click', function () {
		if(!msf) {
			mobileSearchForm.style.transform = "translate(-5%, -70%)"
			mHeader.style.transform = "translateY(-500%)"
			navBtn.style.transform = "translateY(-500%)"
			msf = true
		} 
	})

	mainSearhMClose.addEventListener('click', function () {
		mobileSearchForm.style.transform = "translate(200%, -70%)"
			mHeader.style.transform = "translateY(0%)"
			navBtn.style.transform = "translateY(0%)"
			msf = false
	})
	

	// window.scrollTo(0, 0);
	// const typeBtn = document.querySelectorAll('.types')[0];
	// const nameBtn = document.querySelectorAll('.names')[0];
	//navmen 
	// const navDropDown = document.querySelector('.menu-item-has-children');
	// const navDrop = document.querySelectorAll('.newNav')[0]
	
	const navMenu = document.querySelectorAll('.home-header-nav')[0];
	let menu = true;
	navBtn.addEventListener('click', function () {
		if(menu) {
			navBtn.classList.add('open');
			navMenu.style.transform = "translateX(0%)";
		} else {
			navMenu.style.transform = "translateX(100%)";
			navBtn.classList.remove('open');
		}
		menu = !menu;
	})
	// let navDrop1 = false
	// const windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

	// if(windowWidth < 500) {
	// 	navDrop.addEventListener('click', function() {
	// 		if(!navDrop1) {
	// 			document.querySelectorAll('.newNav > ul')[0].style.display = 'flex';
	// 			navDrop1 = true
	// 		} else {
	// 			document.querySelectorAll('.newNav > ul')[0].style.display = 'none';
	// 			navDrop1 = false
	// 		}
	// 	})
	// }

	// addEventListener('click', function(){
	// 	if(navDrop1) {
	// 		document.querySelectorAll('.newNav > ul')[0].style.display = 'none';
	// 		return navDrop1 = false
	// 	}
	// })

	// getComputedStyle(navDropDown, '::after').addEventListener('click', function (e) {
	// 	console.log('click')
	// })

	// let tBtn = false;
	// typeBtn.addEventListener('click', function () {
	// 	if(!tBtn) {
	// 		document.querySelectorAll('.shops-search-category-container-types')[0].style.display = 'flex';
	// 		typeBtn.style.transform = 'rotate(180deg)';
	// 		tBtn = true;
	// 	} else {
	// 		document.querySelectorAll('.shops-search-category-container-types')[0].style.display = 'none';
	// 		typeBtn.style.transform = 'rotate(0deg)';
	// 		tBtn = false;
	// 	}
	// })

	// let nBtn = false;
	// nameBtn.addEventListener('click', function () {
	// 	if(!catbtn) {
	// 		document.querySelectorAll('.shops-search-category-container')[0].style.display = 'flex';
	// 		nameBtn.style.transform = 'rotate(180deg)';
	// 		catbtn = true;
	// 	} else {
	// 		document.querySelectorAll('.shops-search-category-container')[0].style.display = 'none';
	// 		nameBtn.style.transform = 'rotate(0deg)';
	// 		catbtn = false;
	// 	}
	// })

	// const drop = document.querySelectorAll('.menu-item-has-children', ':after')[0]

	// console.log(drop)
	// const cDrop = getComputedStyle(drop, ':after').getPropertyValue('content');
	// console.log(cDrop)
	// cDrop.addEventListener('click', console.log())
	// theme switcher
	
	const btn = document.querySelectorAll('.home-header-top-themeswitch');
	const btnCircle = document.querySelectorAll('.home-header-top-themeswitch-circle');
	const faTheme = document.querySelectorAll(".fa-theme");
	let localTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");

	if(localTheme) document.documentElement.setAttribute('data-theme', localTheme);

	let currentTheme = document.documentElement.getAttribute('data-theme');

	function btnSwitchTranslate (translateV ) {
		if(currentTheme === 'light') {
			translateV.style.transform = 'translateX(-50%)'
		} else {
			translateV.style.transform = 'translateX(50%)'
		}
	}

	function btnSwitchFa (faV) {
		if(currentTheme === 'light') {
			faV.classList.remove('fa-moon')
			faV.classList.add('fa-sun')
		} else {
			faV.classList.remove('fa-sun')
			faV.classList.add('fa-moon')
		}
	}

	function btnSwitchObject () {

		Object.entries(btnCircle).forEach(([k, v])=> {
			btnSwitchTranslate(v);
		})

		Object.entries(faTheme).forEach(([k, v])=> {
			btnSwitchFa(v);
		})
	}

	btnSwitchObject();


	Object.entries(btn).forEach(([k, v])=> { 
		v.addEventListener('click', function () {
			currentTheme = document.documentElement.getAttribute('data-theme');
			let targetTheme = 'light';
			if(currentTheme === 'light') targetTheme = 'dark';
			document.documentElement.setAttribute('data-theme', targetTheme);
			localStorage.setItem('theme', targetTheme);
			setTimeout(
				function (){
					currentTheme = document.documentElement.getAttribute('data-theme');
					btnSwitchObject()
				}
				,100)
		})
	})

	document.querySelectorAll('.close-sticky')[0].addEventListener('click', function () {
		document.querySelectorAll('.home-announcement')[0].style.display = 'none';
		document.querySelectorAll('.home-header-top')[0].style.marginTop = '0';
	})

	//maps 

	// var leeds = new google.maps.LatLng(53.80583, -1.548903);

    //             var firstLatlng = new google.maps.LatLng(53.80583, -1.548903);              

    //             var firstOptions = {
    //                 zoom: 16,
    //                 center: firstLatlng,
    //                 mapTypeId: google.maps.MapTypeId.ROADMAP 
    //             };

    //             var map = new google.maps.Map(document.getElementById("contact-map"), firstOptions);

    //             firstmarker = new google.maps.Marker({
    //                 map:map,
    //                 draggable:false,
    //                 animation: google.maps.Animation.DROP,
    //                 title: 'Your Client',
    //                 position: leeds
    //             });

    //             var contentString1 = '<p>The Address<br />Of your client<br />in<br />here</p>';


    //             var infowindow1 = new google.maps.InfoWindow({
    //                 content: contentString1
    //             });

    //             google.maps.event.addListener(firstmarker, 'click', function() {
    //                 infowindow1.open(map,firstmarker);
    //             });
	
	

})

// window.onscroll = function() {
	

	// if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		// document.querySelectorAll(".home-header")[0].style.gap = "1rem";
		// document.querySelectorAll(".home-header")[0].style.padding = "0.5rem calc(100vw / 8.5)";
		// document.querySelectorAll(".home-header")[0].style.borderBottom = "1px solid rgba(var(--cw2-fontNormal),0.2)";
		// document.querySelectorAll(".home-header")[0].style.backgroundColor ="var(--cw2-bg)";
		// document.querySelectorAll(".home-header")[0].style.boxShadow = "10px 20px 30px rgba(0,0,0,0.1)";
		// document.querySelectorAll(".home-header-top-brand-img")[0].style.transform = "scale(0.5, 0.5)";
	// } else {
		// document.querySelectorAll(".home-header")[0].style.gap = "2rem";
		// document.querySelectorAll(".home-header")[0].style.padding = "2rem calc(100vw / 8.5)";
		// document.querySelectorAll(".home-header")[0].style.borderBottom = "1px solid rgba(var(--cw2-fontNormal),0.0)";
		// document.querySelectorAll(".home-header")[0].style.backgroundColor ="var(--cw2-bg2)";
		// document.querySelectorAll(".home-header")[0].style.boxShadow = "10px 20px 30px rgba(0,0,0,0)";
		// document.querySelectorAll(".home-header-top-brand-img")[0].style.transform = "scale(1, 1)";
	// }
// };





