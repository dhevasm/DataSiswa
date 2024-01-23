const ham = document.querySelector("#hamburgerbutton");

let sidemin = false;

ham.addEventListener("click", () =>{
    const  sidebar = document.querySelector(".sidebar");
    sidebar.classList.toggle('popupshow');

    const nav = document.querySelector(".navbar");
    nav.classList.toggle("navbarshow");

    const brand = document.querySelector(".brand");
    const search = document.querySelector(".side-search");
    const sidename = document.querySelector(".side-account-name");
    const sidetext = document.querySelectorAll(".sidetext");
    
    if(sidemin == false){
        brand.innerHTML = "<h1>DS</h1>";
        search.style.display = "none";
        sidename.style.display = "none";
        sidetext.forEach(e => {
            e.style.display = "none";
        });
        sidemin = true;
    }else{
        setTimeout(() => {
            brand.innerHTML = "<h1>Data</h1><h1 style='font-weight: lighter;'>Siswa</h1>";
            search.style.display = "block";
            sidename.style.display = "block";
            sidetext.forEach(e => {
                e.style.display = "block";
            });
        }, 300);
        sidemin = false;
    }
    
    const section = document.querySelector(".section");
    section.classList.toggle("navbarshow");

    const chart = document.querySelector(".chart");
    chart.classList.toggle("navbarshow");
    
    const footer = document.querySelector(".footer");
    footer.classList.toggle("navbarshow");
    
    const sideimg = document.querySelector("#side-account-img");
    sideimg.classList.toggle("big");

});

const closeinput = document.querySelector("#closeinput");
closeinput.addEventListener("click", () =>{
    const popupinput = document.querySelector(".tambah-data");
    popupinput.classList.remove("tambah-data-muncul");
});

const openinput = document.querySelectorAll(".openinput");
openinput.forEach(e =>{
    e.addEventListener("click", (el) =>{
        el.preventDefault();
        const popupinput = document.querySelector(".tambah-data");
        popupinput.classList.add("tambah-data-muncul");
    });
});


const dashboard = document.querySelector("#dashboardbutton");
const chart = document.querySelector("#chartbutton");

dashboard.addEventListener("click", (e) =>{
    e.preventDefault();
    document.querySelector(".section").style.display = "block";

    document.querySelector(".chart").style.display = "none";
});

chart.addEventListener("click", (e) =>{
    e.preventDefault();
    document.querySelector(".section").style.display = "none";

    document.querySelector(".chart").style.display = "block";
});

const mobileclose = document.querySelector(".close-side-mobile");
mobileclose.addEventListener("click", () =>{
    const sidebar = document.querySelector(".sidebar");
    sidebar.classList.remove("popupshow");
    
    const sideimg = document.querySelector("#side-account-img");
    sideimg.classList.add("big");

    const chart = document.querySelector(".chart");
    chart.classList.add("navbarshow");
    sidemin = false;
});
