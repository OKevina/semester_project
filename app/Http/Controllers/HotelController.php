<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelImage;

class HotelController extends Controller
{
    // Update hotel information
    public function update(Request $request)
    {
        $hotelId = $request->input('hotel_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');

        $hotel = Hotel::find($hotelId);

        if (!$hotel) {
            return redirect()->back()->with('error', 'Hotel not found');
        }

        $hotel->name = $name;
        $hotel->description = $description;
        $hotel->price = $price;
        $hotel->save();

        return redirect()->back()->with('success', 'Hotel information updated successfully');
    }

    // Delete hotel and associated images
    public function delete(Request $request)
    {
        $hotelId = $request->input('hotel_id');

        $hotel = Hotel::find($hotelId);

        if (!$hotel) {
            return redirect()->back()->with('error', 'Hotel not found');
        }

        // Delete associated images
        $hotel->images()->delete();

        // Delete the hotel
        $hotel->delete();

        return redirect()->back()->with('success', 'Hotel deleted successfully');
    }

    // Update hotel image information
    public function updateImage(Request $request)
    {
        $imageId = $request->input('image_id');
        $imageFilename = $request->input('image_filename');

        $image = HotelImage::find($imageId);

        if (!$image) {
            return redirect()->back()->with('error', 'Image not found');
        }

        $image->image_filename = $imageFilename;
        $image->save();

        return redirect()->back()->with('success', 'Image information updated successfully');
    }

    // Delete hotel image
    public function deleteImage(Request $request)
    {
        $imageId = $request->input('image_id');

        $image = HotelImage::find($imageId);

        if (!$image) {
            return redirect()->back()->with('error', 'Image not found');
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully');
    }
}
