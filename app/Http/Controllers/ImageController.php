<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;

class ImageController extends Controller
{
    public function index()
    {
        // return blade view
        return view('image.index');
    }

    public function process()
    {
        // Get the uploaded file from the request
        $file = request()->file('image');

        // Save the file to the public folder
        $file->store('public');

        // Get the path of the stored file
        $path = storage_path('app/public/' . $file->hashName());

        // Get the executable path
        $executable = base_path('storage/app/ogg.exe');

        // Generate the output filename from the input filename ogg-<filename>.png
        $outputFilename = 'ogg-' . $file->getClientOriginalName() . '.png';

        // Generate the output path from the output filename
        $outputPath = storage_path('app/public/' . $outputFilename);

        $command = "$executable -i \"$path\" -o \"$outputPath\" 2>&1";

        // Run the ogg command with the file as the input
        exec($command);

        // Return the image partial view
        return view('image.partials.image', compact('outputFilename'));

        // Return the image
        return response()->file($outputPath);
    }
}
