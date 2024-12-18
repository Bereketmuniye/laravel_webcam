<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
  

class WebcamController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('webcam');
    }
  

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        // Capture and upload image code
        $img = $request->image;
        $folderPath = "public/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $rand_code = Str::random(6);
        $fileName = time() . $rand_code . '.png';
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        $id = User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'photo_name' => $fileName
        ])->id;

        return redirect('photo/'.$id);
    }


    public function photo($id)
    {
        $data = User::where('id',$id)->first();
        return view('photo',compact('data'));
    }

}