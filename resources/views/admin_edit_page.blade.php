@extends('layouts.layout')

@section('title', 'Admin Edit Page')

@section('content')
    <h2>Hotel Management - Admin Edit Page</h2>

    @foreach ($allHotels as $hotel)
        <div class="hotel-admin">
            <h3>{{ $hotel->name }}</h3>
            <p>{{ $hotel->description }}</p>
            <p>Price: {{ $hotel->price }}</p>

            <!-- Display hotel images for editing -->
            <div class="hotel-images-admin">
                @foreach ($hotel->images as $image)
                    <img src="{{ $image->image }}" alt="{{ $hotel->name }}" class="hotel-image-admin">
                    <form action="{{ route('hotel.updateImage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_id" value="{{ $image->id }}">
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                        <input type="file" name="image_file" accept="image/*" required>
                        <button type="submit" name="update_image" onclick="return confirm('Are you sure you want to update this image?')">Update Image</button>
                    </form>
                @endforeach
            </div>

            <!-- Form for updating hotel information -->
            <form action="{{ route('hotel.update') }}" method="post">
                @csrf
                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $hotel->name }}" required>
                <label for="description">Description:</label>
                <textarea name="description" required>{{ $hotel->description }}</textarea>
                <label for="price">Price:</label>
                <input type="text" name="price" value="{{ $hotel->price }}" required>
                <button type="submit" name="update_hotel" onclick="return confirm('Are you sure you want to update this hotel?')">Update Hotel</button>
                <button type="submit" name="delete_hotel" onclick="return confirm('Are you sure you want to delete this hotel?')">Delete Hotel</button>
            </form>
        </div>
    @endforeach
@endsection
