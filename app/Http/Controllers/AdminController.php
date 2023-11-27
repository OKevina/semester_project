<?php

// app/Http/Controllers/AdminController.php

// AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    // Display the admin edit page
    public function showEditPage()
    {
        // Fetch all hotels data
        $allHotels = Hotel::all();

        return view('admin_edit_page', ['allHotels' => $allHotels]);
    }

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
    $hotelId = $request->input('hotel_id');
    $imageFile = $request->file('image_file');

    $image = HotelImage::find($imageId);

    if (!$image) {
        return redirect()->back()->with('error', 'Image not found');
    }

    // Validate and store the new image
    $this->validate($request, [
        'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $newImageFilename = $imageFile->getClientOriginalName();
    $imageFile->move('Images', $newImageFilename);

    // Update the "image_filename" column
    $image->image_filename = $newImageFilename;
    $image->save();

    return redirect()->back()->with('success', 'Image updated successfully');
}


    // Delete hotel image
    public function deleteImage(Request $request)
{
    $imageId = $request->input('image_id');

    $image = HotelImage::find($imageId);

    if (!$image) {
        return redirect()->back()->with('error', 'Image not found');
    }

    // Delete image file from storage or public directory
    Storage::delete('Images' . $image->image_filename);

    // Delete the entry in the database
    $image->delete();

    return redirect()->back()->with('success', 'Image deleted successfully');
}
}

