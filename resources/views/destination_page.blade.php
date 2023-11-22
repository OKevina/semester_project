@extends('layouts.layout')

@section('title', 'Destination Page')

@section('content')

@foreach ($destinations as $destinationId => $destination)
    <section class="destination">
        <h2>{{ $destination['country'] }}</h2>
        <div class="hotels">
            @foreach ($destination['hotels'] as $hotel)
                <div class="hotel">
                    <h3>{{ $hotel['name'] }}</h3>
                    <p>{{ $hotel['description'] }}</p>
                    <p>Price: {{ $hotel['price'] }}</p>

                    <!-- Display hotel images -->
                    <div class="hotel-images">
                        @foreach ($hotel['images'] as $image)
                         <img src="{{ asset('Images/' . $image['image_filename']) }}" alt="{{ $hotel['name'] }}">
                        @endforeach
                    </div>

                    <a href="#" class="book-now">Book Now</a>
                </div>
            @endforeach
        </div>
    </section>
@endforeach

@endsection
