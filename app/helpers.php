<?php

use App\Models\About;
use App\Models\Brand;
use App\Models\MetaTag;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Welcome;
use Intervention\Image\Facades\Image;


function getUi()
{
    return About::first();
}

function getAbout()
{
    return About::first();
}

function getPortfolio()
{
    $portfolio = Portfolio::orderBy('id', 'asc')->take(3)->get();
    return $portfolio;
}


// function getBlog()
// {
//     return Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
// }

function getService()
{
    return Service::all();
}

function getBrands()
{
    return Brand::first();
}
function getWelcome()
{
    return Welcome::first();
}

// function getReview()
// {
//     return Review::whereStatus(1)->get();
// }

function getSocial()
{
    return Social::first();
}


function metaTags()
{
    return MetaTag::all();
}



function getSetting()
{
    return Setting::first();
}


if (!function_exists('update_image')) {
    function update_image($folder, $currentImagePath, $key): string
    {
        if (request()->hasFile($key)) {
            $image = request()->file($key);
            $ext = $image->getClientOriginalExtension();
            $filename = substr(rand(1, 9000000000000) . time(), 2);
            $currentImagePath = $filename.'.'.$ext; 
            // Use Intervention Image to resize the image
            // Image::make($image->getRealPath())->resize(828, 827)->save($folder.'/'.$currentImagePath);
            // Image::make($image->getRealPath())->resize(828, 827)->save(public_path($folder.'/'.$currentImagePath));
            $image->storeAs($folder,$currentImagePath,'public');
        }
        return $currentImagePath; 
    }
}



    if (!function_exists('upload_single_image')){
        function upload_single_image($folder,$key): string
        {
            $fileNameToStore = 'no-image.png';
            if (request()->hasFile($key )){
                $image = request()->file($key);
                $ext = $image->getClientOriginalExtension();
                $fileName = substr(rand(1,9000000000000).time(),2);
                $fileNameToStore =  $fileName.'.'.$ext;
                // Image::make($image->getRealPath())->resize(828, 827)->save($folder.'/'.$fileNameToStore);
                // Image::make($image->getRealPath())->resize(828, 827)->save(public_path($folder.'/'.$fileNameToStore));
                $image->storeAs($folder,$fileNameToStore,'public');
            
            }
            return $fileNameToStore;
        }
    }

    

    if (!function_exists('upload_multiple_images')){
        function upload_multiple_images($folder)
        {
            $urls = [];
            if (request()->hasFile('images')){
                foreach (request()->file('images') as $image) {
                    //Get the image extension
                    $ext = $image->getClientOriginalExtension();
                    //Build the filename
                    $fileName = substr(rand(1,9000000000000).time(),2);
                    $fileNameToStore = $fileName.'.'.$ext;
                    //Store the image
                    Image::make($image->getRealPath())->resize(500, 500)->save(public_path($folder.'/'.$fileNameToStore));

                    //array_push($urls,$fileNameToStore)
                    $urls[] = $fileNameToStore;
            }
                return $urls;
            }
        }
    }


    if (!function_exists('set_active_url')) {
        # code...
        function set_active_url(String $routNameToPass) : String{
            if (route($routNameToPass) == url()->current()){
                return 'active';
            } else {
                return '';
            }
        }
    }
