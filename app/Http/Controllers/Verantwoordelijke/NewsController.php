<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\Helpers\Json;
use App\NewsItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //work in progress
        $newsitems = NewsItem::paginate(3);
        $result = compact('newsitems');
        \Facades\App\Helpers\Json::dump($result);   //JSON werkt alleen op mijn computer wanneer er \Facades\App\Helpers\ voor staat (Bram)
        return view('Verantwoordelijke.news',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsitems = new NewsItem();
        $result = compact('newsitems');
        \Facades\App\Helpers\Json::dump($result);
        return view('Verantwoordelijke.Nieuws.create',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsitems = new NewsItem();


        $newsitems->title = $request->title;
        $newsitems->description = $request->description;
        $newsitems->save();
        session()->flash('success', "$newsitems->title has been updated");
        return redirect('/news/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function show(NewsItem $newsItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsitems = NewsItem::findOrFail($id);
        $result = compact('newsitems');
        \Facades\App\Helpers\Json::dump($result);

        return view('Verantwoordelijke.Nieuws.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newsitems = NewsItem::findOrFail($id);
        $newsitems->title = $request->title;
        $newsitems->description = $request->description;
        $newsitems->save();
        session()->flash('success', "$newsitems->title has been updated");
        return redirect('/news/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //werkt nog niet
        $newsItem = NewsItem::findOrFail($id);
        $newsItem->delete();
        return response()->json([
            'type' => 'success',
            'text' => "Nieuwsitem is verwijderd"
        ]);
    }
}
