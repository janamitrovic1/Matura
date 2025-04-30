const slike = document.querySelectorAll(".small_image img");

slike.forEach(element => {
    element.addEventListener("mouseover", () => {
        const audio = document.getElementById("audio-" + element.id);
        if (audio) {
            audio.currentTime = 0;
            audio.play();
        }
    });
    element.addEventListener("click",() => {
        console.log("Kliknuto:", element.id);
		window.open("../pages/zivotinja.php?zivotinja=" + element.id, `Domaće životinje | ${element.id}`, `width=500,height=300,left=100,top=100,menubar=no,toolbar=no`)
	});
});