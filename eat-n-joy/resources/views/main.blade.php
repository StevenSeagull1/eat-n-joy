<x-app-layout>
<script>
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

        // zorg ervoor dat "alles" wautomatisch is geselecteerd
        var allesCategorie = document.querySelector(".categorie[data-category='alles']");
        allesCategorie.classList.add("active");
        allesCategorie.style.border = "5px solid #7F4E0E";

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
        .categorie{
            border: #F6A30F 5px solid;
            border-radius: 40px;
            margin-left:8%;
            margin-top: 1%;
            font-weight:900;
            height:10%;
            width:15%;
            text-align:center;
            font-size:3vw;
        }

        .categorie.active {
            border: 5px solid red; /* Pas de gewenste borderkleur aan */
        }

        .item-cato{
            display:flex;
        }

        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
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
            border: 5px solid #7F4E0E;
            border-radius: 40px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Verticaal centreren */
            text-align: center;
            position: relative;
            margin-top:20%;
        }

        .grid-item img {
            max-width: 100%;
            height: auto;
            margin-top: -40%;
        }

        .product-info {
            font-weight:900;
            font-size: 140%;
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
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 2%;
            margin-bottom: 0;
        }

        #myInput{
            border:solid 5px #48494B;
            color:#7B7B7B;
            border-radius:40px;
            width:40%;
            padding: 10px;
        }

        #foto{
            max-width: 100%;
            height: auto;
            margin-right: 15px;
        }

        .grid-item img{
            /* height:50%; */
        }
    </style>

<div class="item-cato">
    <div class="categorie" data-category="alles">ALLES</div>
    <div class="categorie" data-category="1">BROOD</div>
    <div class="categorie" data-category="2">DRANK</div>
    <div class="categorie" data-category="3">SNACKS</div>
</div>

    <div class="search">
        <img id="foto" src='images/vergrootglas.svg'>
        <input id="myInput" type="text" placeholder="Search..">
    </div>

    <div class="container">
           
        <div class="grid">
             @foreach ($products as $prod)
            <div data-category='{{$prod["categorie_categorieid"]}}' class="grid-item">
                <div class="grid-img">
                    <img src="images/prod_img/{{$prod['product_image']}}" alt="Afbeelding 1">
                </div>
                <div class="product-info">
                <h3>{{$prod['productnaam']}}</h3>
                    <p>€{{$prod['prijs']}}</p>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
    
    
    
</x-app-layout>
