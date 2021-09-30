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
