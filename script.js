function flip(event) {
	console.log("click");
	var element = event.currentTarget;
	if (element.className === "card") {
		if (element.style.transform == "rotateY(180deg)") {
			element.style.transform = "rotateY(0deg)";
		} else {
			element.style.transform = "rotateY(180deg)";
		}
	}
}

let mainNavLinks = document.querySelectorAll("header nav ul li a");
let mainSections = document.querySelectorAll("main section");
console.log(mainNavLinks);
let lastId;
let cur = [];

window.addEventListener("scroll", (event) => {
	let fromTop = window.scrollY;

	mainNavLinks.forEach((link) => {
		let section = document.querySelector(link.hash);

		if (
			section.offsetTop <= fromTop &&
			section.offsetTop + section.offsetHeight > fromTop
		) {
			link.classList.add("current");
		} else {
			link.classList.remove("current");
		}
	});
});
