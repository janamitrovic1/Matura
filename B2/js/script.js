const slike = document.querySelectorAll(".small_image img");

slike.forEach(element => {
    element.addEventListener("mouseover", () => {
        const audio = document.getElementById("audio-" + element.id);
        if (audio) {
            audio.currentTime = 0; // Resetuj na početak da se pusti iz početka svaki put
            audio.play();
        }
    });
    element.addEventListener("click",()=>{
        
    })
    });