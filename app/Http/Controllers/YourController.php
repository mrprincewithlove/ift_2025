<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class YourController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'id' => $this->getNextId(),
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $filePath = public_path('local_info/registration.json');

        if (!File::exists($filePath)) {
            File::put($filePath, json_encode([$data]));
        } else {
            $jsonData = File::get($filePath);
            $existingData = json_decode($jsonData, true);
            $existingData[] = $data;
            File::put($filePath, json_encode($existingData));
        }

        return redirect()->back()->with('success', 'Data saved successfully!');
    }

    private function getNextId()
    {
        $filePath = public_path('local_info/registration.json');

        if (!File::exists($filePath)) {
            return 1;
        }

        $jsonData = File::get($filePath);
        $existingData = json_decode($jsonData, true);

        if (empty($existingData)) {
            return 1;
        }

        $lastId = end($existingData)['id'];
        return $lastId + 1;
    }
    //
}
