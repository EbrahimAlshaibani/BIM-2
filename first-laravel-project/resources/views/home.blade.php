@extends('layouts.app')

@section('content')
@php
use Illuminate\Support\Carbon;
@endphp
<div class="container">
    <div id="chart"></div>



</div>
<script>

var options = {
    series: [{
        name: 'Electorics',
        data: [
            @foreach ($products_1 as $product)
                {{ $product->products }},
            @endforeach
        ],
    }, {
        name: 'Food',
        data: [
            @foreach ($products_2 as $product)
                {{ $product->products }},
            @endforeach
        ]
    }, {
        name: 'Clothes',
        data: [
            @foreach ($products_3 as $product)
                {{ $product->products }},
            @endforeach
        ]
    }],
    chart: {
        height: 350,
        type: 'area',
        toolbar: {
        show: false
        },
    },
    markers: {
        size: 4
    },
    colors: ['#4154f1', '#2eca6a', '#ff771d'],
    fill: {
        type: "gradient",
        gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.3,
        opacityTo: 0.4,
        stops: [0, 90, 100]
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        width: 2
    },
    xaxis: {
        type: 'datetime',
        categories: [
            @foreach ($products as $product)
                {{ Carbon::parse($product->date)->format('d') }},
            @endforeach
        ]
    },
    tooltip: {
        x: {
        format: 'dd/MM/yy HH:mm'
        },
    }
}

var chart = new ApexCharts(document.querySelector("#chart"), options).render();

</script>
@endsection
