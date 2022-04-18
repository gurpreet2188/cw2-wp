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

document.addEventListener('DOMContentLoaded', function(e){
	window.scrollTo(0, 0);

	//navmen 
	const navBtn = document.querySelectorAll('.home-header-top-btnNav')[0];
	const navMenu = document.querySelectorAll('.home-header-nav')[0];
	let menu = true;
	navBtn.addEventListener('click', function () {
		if(menu) {
			navMenu.style.transform = "translateX(0%)";
		} else {
			navMenu.style.transform = "translateX(100%)";
		}
		menu = !menu;
	})



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

	
	

	

})

window.onscroll = function() {
	

	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		document.querySelectorAll(".home-header")[0].style.gap = "1rem";
		document.querySelectorAll(".home-header")[0].style.padding = "0.5rem calc(100vw / 8.5)";
		document.querySelectorAll(".home-header")[0].style.borderBottom = "1px solid rgba(var(--cw2-fontNormal),0.2)";
		document.querySelectorAll(".home-header")[0].style.backgroundColor ="var(--cw2-bg)";
		// document.querySelectorAll(".home-header")[0].style.boxShadow = "10px 20px 30px rgba(0,0,0,0.1)";
		document.querySelectorAll(".home-header-top-brand-img")[0].style.transform = "scale(0.5, 0.5)";
	} else {
		document.querySelectorAll(".home-header")[0].style.gap = "2rem";
		document.querySelectorAll(".home-header")[0].style.padding = "2rem calc(100vw / 8.5)";
		document.querySelectorAll(".home-header")[0].style.borderBottom = "1px solid rgba(var(--cw2-fontNormal),0.0)";
		document.querySelectorAll(".home-header")[0].style.backgroundColor ="var(--cw2-bg2)";
		// document.querySelectorAll(".home-header")[0].style.boxShadow = "10px 20px 30px rgba(0,0,0,0)";
		document.querySelectorAll(".home-header-top-brand-img")[0].style.transform = "scale(1, 1)";
	}
};





