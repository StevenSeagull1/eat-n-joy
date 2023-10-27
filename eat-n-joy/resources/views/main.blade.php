<x-app-layout>
<script>

var winkelwagen = [];
// function openPopup(productnaam, prijs) {
//         var popup = document.getElementById("popup");
//         var popupContent = document.getElementById("popup-content");
//         var body = document.querySelector("body");

//         // Voeg de blur-klasse toe aan de body
//         body.classList.add("blur-background");

//         popupContent.innerHTML = `
//             <img src="images/brood.png" alt="Afbeelding 1">
//             <h3>${productnaam}</h3>
//             <p>${prijs}</p>
//         `;

//         popup.style.display = "block";
//     }

//     function closePopup() {
//         var popup = document.getElementById("popup");
//         var body = document.querySelector("body");

//         // Verwijder de blur-klasse van de body
//         body.classList.remove("blur-background");

//         popup.style.display = "none";
//     }
var button = document.getElementById("button")
function addToCart(button) {
    // alert("item toegevoegd")
    var gridItem = button.closest(".grid-item");
    var productnaam = gridItem.querySelector("h3").textContent;
    var prijs = gridItem.querySelector("p").textContent;
    var afbeelding = gridItem.querySelector("img");
    var id = gridItem.getAttribute("data-id");
    console.log(id)
    winkelwagen.push({ id:id, productnaam: productnaam, prijs: prijs, afbeelding: afbeelding });
    console.log(winkelwagen);
}
document.addEventListener("DOMContentLoaded", function () {
        var input = document.getElementById("myInput");
        var gridItems = document.querySelectorAll(".grid-item");
        var categories = document.querySelectorAll(".categorie");

        // Voeg een klikgebeurtenis toe aan elke categorie
        categories.forEach(function (category) {
            category.addEventListener("click", function () {
                var selectedCategory = category.getAttribute("data-category");

                // Verwijder eerst alle huidige filterklassen van de categorieën
                categories.forEach(function (cat) {
                    cat.classList.remove("active");
                    cat.style.border = "5px solid #F6A30F";
                });

                // Markeer de geselecteerde categorie
                category.classList.add("active");
                category.style.border = "5px solid #7F4E0E";

                // Filter producten op basis van de geselecteerde categorie
                gridItems.forEach(function (item) {
                    var productCategory = item.getAttribute("data-category");

                    if (selectedCategory === "alles" || selectedCategory === productCategory) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
        function showOverlay() {
    var popup = document.getElementById("popup");
    var popupContent = document.getElementById("popup-content");

    // Voeg de gewenste inhoud toe aan de popupContent div
  popupContent.innerHTML = '';

  var totalePrijs = 0; // Variabele om de totale prijs bij te houden

        for (let i = 0; i < winkelwagen.length; i++) {
    var productContainer = document.createElement('div');
    productContainer.className = 'product-container';

    // Voeg de productnaam en prijs toe aan het productContainer
    productContainer.innerHTML = winkelwagen[i].productnaam + " " + winkelwagen[i].prijs;

    // Voeg de afbeelding toe aan het productContainer
    var afbeeldingURL = winkelwagen[i].afbeelding.src;
    productContainer.innerHTML += "<br><img class='popup-image' src='" + afbeeldingURL + "'>";

    // Voeg het productContainer toe aan de popupContent
    popupContent.appendChild(productContainer);

    // Voeg een nieuwe regel toe tussen de items
            if (i < winkelwagen.length - 1) {
      popupContent.innerHTML += "<hr>";
  }

    // Update de totale prijs
    totalePrijs += parseFloat(winkelwagen[i].prijs);
    }

  // Voeg de totale prijs toe aan de popupContent
  popupContent.innerHTML += "<hr><b>Totale prijs:</b> " + totalePrijs.toFixed(2);
  popupContent.innerHTML += "<a href='/bestelling'><hr><button onclick='betaal()'>betalen</button></a> ";

    popup.style.display = "block";
    document.body.classList.add("blur-background");
}




// zorg ervoor dat "alles" wautomatisch is geselecteerd
var allesCategorie = document.querySelector(".categorie[data-category='alles']");
allesCategorie.classList.add("active");
allesCategorie.style.border = "5px solid #7F4E0E";

// Rest van je code...

// Voeg een klikgebeurtenis toe aan het winkelwagen.svg-pictogram om de overlay weer te geven
var winkelwagenIcon = document.querySelector("img[src='images/icons/winkelwagen.svg']");
winkelwagenIcon.addEventListener("click", showOverlay);

// Voeg een klikgebeurtenis toe aan de knop om de overlay te sluiten
var closeButton = document.querySelector(".close-button");
closeButton.addEventListener("click", closePopup);

// Functie om de overlay te verbergen
function closePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
    document.body.classList.remove("blur-background"); // Verwijder de klasse om de achtergrondvervaging te verwijderen
}

    // Voeg event listeners toe aan de grid-items om de pop-up te openen
    var gridItems = document.querySelectorAll(".grid-item");

    gridItems.forEach(function (item) {
        item.addEventListener("click", function () {
            var productnaam = item.querySelector("h3").textContent;
            var prijs = item.querySelector("p").textContent;
        });
    });
        // Voeg een invoergebeurtenis toe aan de zoekbalk
        input.addEventListener("input", function () {
            var filter = input.value.toLowerCase();

            gridItems.forEach(function (item) {
                var productName = item.querySelector("h3").textContent.toLowerCase();

                if (productName.includes(filter)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });

    async function betaal(){
            // console.log("test")
            var jsonObj = {};
            for (var i = 0 ; i < winkelwagen.length; i++) {
            jsonObj["item" + (i+1)] = winkelwagen[i];    
        }
        // console.log(jsonObj)
        await window.axios.post("ajax/bestelling", 
            jsonObj
        )
    }
</script>

<style>

    @font-face {
        font-family: 'SuperCorn';
        font-style: normal;
        font-weight: normal;
        src: url('super-corn-cufonfonts-webfont/Super Corn.woff');
    }

    /*region popup*/   
    .popup-container {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        background-color: #fff;
        border: 5px solid black;
        border-radius: 40px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        padding: 20px;
        width:100%;
        height:100%;
    }

    .popup-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Hier kun je de gewenste breedte instellen */
        gap: 10px; /* Ruimte tussen de product containers */
        text-align: center;
        overflow-y:auto;
        max-height:100%;
    }

    .product-container {
        border: 1px solid #ccc;
        padding: 10px;
        /* text-align-c */
    }


    .popup-image {
        max-width: 100%; /* Maak de afbeelding 100% van de breedte van het productcontainer */
        height: auto; /* Behoud de juiste aspectverhouding */
    }

    .popup-image {
        max-width: 100px; /* Stel de maximale breedte in zoals gewenst */
        max-height: 100px; /* Stel de maximale hoogte in zoals gewenst */
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .popup-content h3 {
        font-weight: bold;
    }

    .popup-content p {
        margin: 10px 0;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }
    /*endregion*/

    /*region categorie*/
    .categorie{
        border: #F6A30F 5px solid;
        border-radius: 40px;
        margin-left:8%;
        margin-top: 95px;
        font-weight:900;
        height:10%;
        width:15%;
        text-align:center;
        font-size:3vw;
        cursor:pointer;
    }

    .categorie.active {
        border: #94580E 5px solid;
    }

    .item-cato{
        display:flex;
    }
    /*endregion*/

    body{
        font-family: 'SuperCorn';
        margin: 0;
        padding: 0;
        background-color: #fff;
        background-image: url("images/achtergrond.svg");
        background-position: right bottom;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 90%;
        background-origin: content-box;
        height: 100vh;
        width: 100%;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        margin-top:5%;
    }

    /*region Grid opmaak*/
    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .grid-item {
        background-color: #fff;
        padding: 20px;
        border: 5px solid #7F4E0E;
        border-radius: 150px;
        display: flex;
        flex-direction: column;
        align-items: center; /* Verticaal centreren */
        text-align: center;
        position: relative;
        margin-top:20%;
        cursor:pointer;
    }

    .grid-img {
        max-width: 100%;
        height: auto;
        margin-top: -40%;
    }
    /*endregion*/

    /*region product*/
    .product-info {
        font-weight:900;
        font-size: 140%;
    }

    .product-info p{
        white-space: nowrap;
        display: flex;
        font-size: 250%;
    }

    .prijskaart {
        width: 20%;
    }

    .toevoegen_winkelwagenimg {
        width: 40%;
    }
    /*endregion*/

    /*region search*/
    .search{
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: 2%;
        margin-bottom: -2%;
    }

    #myInput{
        border:solid 5px #48494B;
        color:#7B7B7B;
        border-radius:40px;
        padding: 10px;
    }
    
    #foto{
        max-width: 100%;
        height: auto;
        margin-right: 15px;
    }
    /*endregion*/

    /*region media queries*/
    @media (min-width: 768px) {
        #myInput {
            width: 40%;
        }
    }
    
    @media (max-width: 768px) {
        .grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .grid {
            grid-template-columns: 1fr;
        }
    
        .categorie {
            margin-top: 100px;
            font-size: 6vw;
            width: 22%;
            margin-left: 2.5%;
        }
    
        #myInput {
            width: 70%;
        }
    
        .prijskaart {
            width: 25%;
            margin-left: 4%;
        }
    
        .toevoegen_winkelwagenimg {
            width: 40%;
        }
    }
    /*endregion*/
    
</style>

<body>

<div class="item-cato">
    <div class="categorie" data-category="alles">ALLES</div>
    <div class="categorie" data-category="1">BROOD</div>
    <div class="categorie" data-category="2">DRANK</div>
    <div class="categorie" data-category="3">SNACKS</div>
</div>

    <div class="search">
        <img id="foto" src='images/icons/vergrootglas.svg'>
        <input id="myInput" type="text" placeholder="Search..">
    </div>

    <div class="container">
        <div class="grid">
             <!-- Voeg dynamisch producten toe -->
            @foreach ($products as $prod)
                <div  data-id='{{$prod["productid"]}}' data-category='{{$prod["categorie_categorieid"]}}' class="grid-item">
                    <div class="grid-img">
                        <img src="images/prod_img/{{$prod['product_image']}}" alt="Product 1">
                    </div>
                    <div class="product-info">
                        <h3>{{$prod['productnaam']}}</h3>
                        <div style="display:flex;justify-content:space-between;">
                            <p><img class="prijskaart" src="images/icons/prijskaartje.svg">{{$prod['prijs']}} </p>
                            <button onclick="addToCart(this)" style="justify-content:center;display:flex;align-items:center;"><img class="toevoegen_winkelwagenimg" src="images/icons/toevoegen_winkelwagen.svg"></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="popup-container" id="popup">
    <div class="popup-content">
        <span class="close-button" >&times;</span>
        <div id="popup-content"></div>
    </div>
</div>

</body>
</x-app-layout>