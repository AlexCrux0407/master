<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleFaceAuthController extends Controller
{
    public function showFaceAuth()
    {
        return view('auth.face-auth');
    }

    public function verifyFace(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $imagePath = $request->file('image')->getRealPath();

        // Para usar API key, debes usar el cliente REST en lugar de gRPC
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . storage_path('app/google-credentials.json'));

        $imageAnnotator = new ImageAnnotatorClient();

        $image = file_get_contents($imagePath);
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        if (count($faces) === 0) {
            return back()->withErrors(['face' => 'No face detected. Please try again.']);
        }        
        return redirect()->route('index')->with('success', 'Face authenticated successfully!');
    }
}