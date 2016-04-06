<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Badcow\LoremIpsum\Generator;

class LoremIpsumController extends Controller
{
    public function getIndex()
    {
        return view('loremipsum.index');
    }
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'paragraphs'=>'required|numeric|min:1'
        ]);

        $data = $request->all();

        $gen = new Generator;

        $textLoremIpsum = $gen->getParagraphs($data['paragraphs']);

        if(!$textLoremIpsum) {
            dd("Error generating LoremIpsum text");
        }

         return view('loremipsum.postindex')->with(['textLoremIpsum'=>$textLoremIpsum]);
    }
}
