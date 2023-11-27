<?php

// app/Http/Controllers/AdminController.php

// AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelImage;

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

    // Assuming you have an input field named 'update_image' for file upload
    $newImage = $request->file('update_image');

    $image = HotelImage::find($imageId);

    if (!$image) {
        return redirect()->back()->with('error', 'Image not found');
    }

    // Check if a new image was uploaded
    if ($newImage) {
        // Get the new filename and store it in the 'image_filename' column
        $image->image_filename = $newImage->getClientOriginalName();

        // You might want to handle the actual file upload here as well
        // For example, you can move the uploaded file to a specific directory
        $newImage->move('your_upload_directory', $newImage->getClientOriginalName());
    }

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

