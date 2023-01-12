<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\GfxPhp\Image;

class IndexController extends Controller
{
    public function index()
    {
        for ($y = -39; $y < 39; $y++) {
            printf("\n");
    
            for ($x = -39; $x < 39; $x++) {
                $i = $this->mandelbrot(
                    $x / 40.0,
                    $y / 40.0
                );
    
                if ($i == 0) {
                    printf("*");
                } else {
                    printf(" ");
                }
            }
        }
    
        printf("\n");
    
    }

    private function mandelbrot($x, $y)
   {
    $cr = $y - 0.5;
    $ci = $x;
    $zi = 0.0;
    $zr = 0.0;
    $i = 0;

    while (1) {
        $i++;
        
        $temp = $zr * $zi;
        
        $zr2 = $zr * $zr;
        $zi2 = $zi * $zi;
        
        $zr = $zr2 - $zi2 + $cr;
        $zi = $temp + $temp + $ci;

        if ($zi2 + $zr2 > 16) {
            return $i;
        }

        if ($i > 5000) {
            return 0;
        }
      }
    }

    public function image(){
//echo get_current_user();die;    
	    $time_start = microtime(true); 

	$img = Image::fromFile("/data/project/example_image/file_example_PNG_500kB.png");
	$img2 = $img->scale(1275, 849);
	$img2->write("/data/project/example_image/rescale.png");
	
	$time_end = microtime(true);

	//dividing with 60 will give the execution time in minutes otherwise seconds
	$execution_time = ($time_end - $time_start);

	//execution time of the script
	echo '<b>Total Execution Time:</b> '.$execution_time.' Second';
    }
}
