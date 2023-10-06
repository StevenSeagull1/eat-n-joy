<x-app-layout>

    
     <script>

var winkelwagen = [];
function openPopup(productnaam, prijs) {
        var popup = document.getElementById("popup");
        var popupContent = document.getElementById("popup-content");
        var body = document.querySelector("body");

        // Voeg de blur-klasse toe aan de body
        body.classList.add("blur-background");

        popupContent.innerHTML = `
            <img src="images/brood.png" alt="Afbeelding 1">
            <h3>${productnaam}</h3>
            <p>${prijs}</p>
        `;

        popup.style.display = "block";
    }

    function closePopup() {
        var popup = document.getElementById("popup");
        var body = document.querySelector("body");

        // Verwijder de blur-klasse van de body
        body.classList.remove("blur-background");

        popup.style.display = "none";
    }
var button = document.getElementById("button")
function addToCart(button) {
    var gridItem = button.closest(".grid-item");
    var productnaam = gridItem.querySelector("h3").textContent;
    var prijs = gridItem.querySelector("p").textContent;
    winkelwagen.push({ productnaam: productnaam, prijs: prijs });
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
                });

                // Markeer de geselecteerde categorie
                category.classList.add("active");

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
            console.log(winkelwagen[0].productnaam)
    // Voeg de gewenste inhoud toe aan de popupContent div
    popupContent.innerHTML = ''
        for (let i = 0; i < winkelwagen.length; i++) {
            popupContent.innerHTML += winkelwagen[i].productnaam
            popupContent.innerHTML += winkelwagen[i].prijs
            if (i < winkelwagen.length - 1) {
    popupContent.innerHTML += "<br>"; // Voeg een nieuwe regel toe tussen de items
  }
    }
    popup.style.display = "block";
    document.body.classList.add("blur-background");
}

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

// Voeg een klikgebeurtenis toe aan het winkelwagen.svg-pictogram om de overlay weer te geven
var winkelwagenIcon = document.querySelector("img[src='images/icons/winkelwagen.svg']");
winkelwagenIcon.addEventListener("click", showOverlay);

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
</script>
<style>
       
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
        max-width:100%;
        
    }

    .popup-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .popup-content img {
        max-width: 100%;
        height: auto;
        margin-top: -40%; /* Stel de gewenste marge in om de foto uit te laten steken */
        border-radius: 10px 10px 0 0; /* Voeg afronding aan de bovenkant toe */
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
        .categorie{
            border: #F6A30F 5px solid;
            border-radius: 40px;
            margin-left:12%;
            font-weight:900;
            height:20%;
            width:20%;
            text-align:center;
            font-size:3vw;
            cursor:pointer;
        }
        .item-cato{
            display:flex;
        }
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-image: url("images/achtergrond.svg");
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            margin-top:5%;
        }
        /* Grid opmaak */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .grid-item {
            background-color: #fff;
            padding: 20px;
            border: 5px solid #9A5C0D;
            border-radius: 40px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Verticaal centreren */
            text-align: center;
            position: relative;
            margin-top:20%;
            cursor:pointer;
        }
        .grid-item img {
            max-width: 100%;
            height: auto;
            margin-top: -40%;
            
        }
        .categorie.active {
            border: #94580E 5px solid;
        }
        .product-info {
            font-weight:900;
        }
        .product-info p{
            white-space: nowrap;
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
        }
        .search{
            text-align:center;
        }
        #myInput{
            border:solid 1px #ccc;
            color:#7B7B7B;
            border-radius:40px;
            width:40%
        }
        #foto{
            margin-left:30%;
        }
    </style>
    <body>
<div id='winkelwagen'>  
    <img src="images/icons/winkelwagen.svg" style="height:auto; width:7%; float:right;">
    </div>
    <div class="item-cato">
    <div class="categorie" data-category="alles">alles</div>
    <div     class="categorie" data-category="1">broodjes</div>
    <div class="categorie" data-category="2">drank</div>
    <div class="categorie" data-category="3">snacks</div>
</div>
    <div class="search">
        <img id='foto'src='images/vergrootglas.png'>
        <input id='myInput'type="text" placeholder="Search..">
    </div>

    <div class="container">
        <div class="grid">
             <!-- Voeg dynamisch producten toe -->
            @foreach ($products as $prod)
                <div data-category='{{$prod["categorie_categorieid"]}}' class="grid-item">
                    <div class="grid-img">
                        <img src="images/brood.png" alt="Afbeelding 1">
                    </div>
                    <div class="product-info">
                        <h3>{{$prod['productnaam']}}</h3>
                        <p>{{$prod['prijs']}} 🏷</p>
                        <button onclick="addToCart(this)">Voeg toe</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="popup-container" id="popup">
    <div class="popup-content">
        <span class="close-button" onclick="closePopup()">&times;</span>
        <div id="popup-content"></div>
    </div>
</div>
   

</body>
</x-app-layout>