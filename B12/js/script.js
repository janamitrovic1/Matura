const autobus = document.querySelector(".autobus");
let nizsedista = null;
function rezervacija(){
    nizsedista+=this.innerHTML;
}
for(let i = 2;i<=53;i++){
    let sediste = document.createElement("div");
    sediste.className = "sediste";
    sediste.innerHTML=i;
    sediste.addEventListener("click",rezervacija());
    autobus.appendChild(sediste);
}
console.log(nizsedista);