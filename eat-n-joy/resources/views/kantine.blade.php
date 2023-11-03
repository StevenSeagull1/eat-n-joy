<x-app-layout>
<style>
.bestelling{
    border:1px black solid;
    margin-top:10px;
}
.bestelling:first-of-type{
    /* border:1px black solid; */
    margin-top:90px; 
}
</style>

@foreach ($bestelling->sortBydesc('datum') as $order)
    <div class="bestelling">
        @foreach ($order->Bestelling_has_products as $orderLine)
            {{$orderLine->product->productnaam}}|
        @endforeach
        bestellnummer:{{$order['bestellingID']}}| bestelt op: {{$order['datum']}}
        totaal:{{number_format($order->Bestelling_has_products->pluck('product')->sum('prijs'),2)}}
    </div>
@endforeach

</x-app-layout>