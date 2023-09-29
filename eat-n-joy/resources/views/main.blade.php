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
            margin-left:12%;
            font-weight:900;
            height:20%;
            width:20%;
            text-align:center;
            font-size:3vw;
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
            border: 5px solid black;
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
        }
        .product-info h3{
            
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
        .grid-item img{
            /* height:50%; */
        }
    </style>
   <div class="item-cato">
    <div class="categorie" data-category="alles">alles</div>
    <div class="categorie" data-category="1">broodjes</div>
    <div class="categorie" data-category="2">drank</div>
    <div class="categorie" data-category="3">snacks</div>
</div>
    <div class="search">
        <img id='foto'src='images/vergrootglas.png'>
        <input id='myInput'type="text" placeholder="Search..">
    </div>

    <div class="container">
           
        <div class="grid">
             @foreach ($products as $prod)
            <div data-category='{{$prod["categorie_categorieid"]}}' class="grid-item">
                <div class="grid-img">
                    <img src="images/prod_img{{$prod['product_image']}}" alt="Afbeelding 1">
                </div>
                <div class="product-info">
                <h3>{{$prod['productnaam']}}</h3>
                    <p>{{$prod['prijs']}}</p>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
    
    
    
</x-app-layout>
