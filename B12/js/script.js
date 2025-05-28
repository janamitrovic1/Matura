const autobus = document.querySelector(".autobus");
const sedista = document.querySelector("#sedista");
let nizsedista = []; 


sedista.addEventListener("input", function () {

    document.querySelectorAll(".sediste").forEach(s => {
        s.classList.remove("izabrano");
    });

    nizsedista = [];

    const vrednosti = this.value.split(",").map(v => v.trim());

    vrednosti.forEach(broj => {
        let sediste = document.querySelector(`.sediste[data-broj="${broj}"]`);
        if (sediste) {
            sediste.classList.add("izabrano");
            nizsedista.push(broj);
        }
    });

    console.log("Ručno uneto:", nizsedista);
});



function rezervacija() {
    this.classList.toggle("izabrano"); 
    const broj = this.innerHTML;
    const index = nizsedista.indexOf(broj);

    if (this.classList.contains("izabrano")) {
        if (index === -1) nizsedista.push(broj);
    } else {
        if (index !== -1) nizsedista.splice(index, 1);
    }

    sedista.value = nizsedista.join(", ");
    console.log(nizsedista);
}


for (let i = 2; i <= 53; i++) {
    let sediste = document.createElement("div");
    sediste.className = "sediste";
    sediste.innerHTML = i;
    sediste.dataset.broj = i;
    if (rezervisanaSedista.includes(i)) {
        sediste.classList.add("rezervisano");
    } else {
        sediste.addEventListener("click", rezervacija);
    }
    autobus.appendChild(sediste);
}

// console.log(rezervisanaSedista);