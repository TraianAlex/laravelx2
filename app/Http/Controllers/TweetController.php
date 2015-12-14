<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tweet;
use Illuminate\Http\Request;
use App\Tag;

class TweetController extends Controller {

	public function __construct() 
 	{ 
 		$this->middleware('auth', ['except' => ['index', 'show']]); 
 	} 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$search = '';
		if($tags = $request->input('tags')){
			$tweets = Tweet::whereHas('tags', function($query) use ($tags){
				$query->where('id', $tags);
			});
		}else{
			$tweets = Tweet::query();
		}

 		if($search = $request->input('search')){ 
 			$tweets = $tweets->where('title', "LIKE", "%" . $search . "%")->orWhere('body', "LIKE", "%" . $search . "%");
 		}

		$tweets = $tweets->paginate(5);//Tweet::all()

		return view('tweets.index', compact('tweets', 'search'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tweets.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
	        'title' => 'required|unique:tweets|min:3|max:255',
	        'body' => 'required',
	    ]);
	    $image_name = $this->dealWithImage($request);
		$tweet = new Tweet();

		$tweet->title = $request->input("title");
        $tweet->body = $request->input("body");
        $tweet->user_id = auth()->guest() ? 0 : 1;
        $tweet->image_name = $image_name;

		$tweet->save();

		return redirect()->route('tweets.index')->with('message', 'Item created successfully.');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//$tweet = Tweet::findOrFail($id);
		$tweet = Tweet::with('user')->findOrFail($id);

		return view('tweets.show', compact('tweet'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tweet = Tweet::findOrFail($id);

		return view('tweets.edit', compact('tweet'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$tweet = Tweet::findOrFail($id);
		$image_name = $this->dealWithImage($request);

		$tweet->title = $request->input("title");
        $tweet->body = $request->input("body");
        $tweet->image_name = $image_name ?: $tweet->image_name;

		$tweet->save();

		if($request->input('tags')){
			$tags_array = explode(',', $request->input('tags'));
			$tags = [];
			foreach ($tags_array as $tag) {
				$tag_find_or_create = Tag::where('name', $tag)->first();
				if(!$tag_find_or_create){
					$tag_find_or_create = Tag::create(['name' => $tag]);
				}
				$tags[] = $tag_find_or_create->id;
			}
			$tweet->tags()->sync($tags);
		}

		return redirect()->route('tweets.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tweet = Tweet::findOrFail($id);
		$tweet->delete();

		return redirect()->route('tweets.index')->with('message', 'Item deleted successfully.');
	}

	protected function dealWithImage(Request $request)
	{
		if($request->hasFile('image')){
	    	$image_name = $request->file('image')->getClientOriginalName();
	    	$request->file('image')->move(public_path('img/tweet'), $image_name);
	    }else{
	    	$image_name = '';
	    }
	    return $image_name;
	}
}