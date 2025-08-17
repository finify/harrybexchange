<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorecoinRequest;
use App\Http\Requests\UpdatecoinRequest;
use App\Models\Coins;
use App\Models\Giftcard;
use Illuminate\Http\Request;

class GiftcardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $giftcards = Giftcard::orderBy('id','desc')->paginate(5);
        return view('admin.giftcards.index', compact('giftcards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'card_name' => 'required',
            'sell_price' => 'required|numeric',
            'buy_price' => 'required|numeric',
            'card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        $validated = $request->post();
        
        if ($request->hasFile('card_image')) {
            $imageName = time() . '.' . $request->card_image->extension();
            $request->card_image->move(public_path('cards'), $imageName);
            $validated['card_image'] = $imageName;
        }
        Giftcard::create($validated);

        return redirect()->route('giftcards.index')->with('success','Coins has been created successfully.');
    }

    /**
     * Display the specified resource.
     *  * @param  \App\Coins  $Coins
    * @return \Illuminate\Http\Response
     */
    public function show(Giftcard $giftcard)
    {
        //
        return view('admin.giftcards.show',compact('giftcard'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Coins $coins
     * @return \Illuminate\Http\Response
     */
    public function edit(Giftcard $giftcard)
    {
        //
        return view('admin.giftcards.edit',compact('giftcard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Giftcard $giftcard)
    {
        //
        $request->validate([
            'card_name' => 'required',
            'sell_price' => 'required|numeric',
            'buy_price' => 'required|numeric',
            'card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        $validated = $request->post();

        if ($request->hasFile('card_image')) {
            if(file_exists(public_path('cards/' . $giftcard->card_image))){
                unlink(public_path('cards/' . $giftcard->card_image));
            }
            $imageName = time() . '.' . $request->card_image->extension();
            $request->card_image->move(public_path('cards'), $imageName);
            $validated['card_image'] = $imageName;
        }

        $giftcard->fill($validated)->save();

        

        return redirect()->route('giftcards.index')->with('success','Coins Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Giftcard $giftcard)
    {
        //
        if(file_exists(public_path('cards/' . $giftcard->card_image))){
            unlink(public_path('cards/' . $giftcard->card_image));
        }
        $giftcard->delete();
        return redirect()->route('giftcards.index')->with('success','Coins has been deleted successfully');
    }
}
