<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HtmlDomParser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCinemas()
    {
        $html = new \Htmldom('http://www.google.com.au/movies?near=bangalore');
        print '<pre>'; 
        foreach($html->find('#movie_results .theater') as $div) { 
            //print "Theatre:  ".$div->find('h2 a',0)->innertext."\n"; 
            //print "Address: ". $div->find('.info',0)->innertext."\n"; 
            $theater_name = $div->find('h2 a',0)->innertext;
            $theater_address = $div->find('.info',0)->innertext;
            $value[] = ["theater name"=>$theater_name,"theater address"=>$theater_address];
        } 
        print_r (json_encode($value));
        //print_r($value);

        $html->clear(); 

    }
     public function getMovie()
    {
        $html = new \Htmldom('http://www.google.com.au/movies?near=bangalore');
        print '<pre>'; 
        foreach($html->find('#movie_results .theater') as $div) { 

            print "Theate:  ".$div->find('h2 a',0)->innertext."\n"; 
            print "Address: ". $div->find('.info',0)->innertext."\n"; 

         
            foreach($div->find('.movie') as $movie) { 
                print "\tMovie:    ".$movie->find('.name a',0)->innertext.'<br />'; 
                print "\tTime:    ".$movie->find('.times',0)->innertext.'<br />'; 
            } 
            print "\n\n"; 
        } 
                 
        $html->clear(); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
