<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorecoinRequest;
use App\Http\Requests\UpdatecoinRequest;
use App\Models\Coins;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $coins = Coins::orderBy('id','desc')->paginate(5);
        return view('admin.coins.index', compact('coins'));
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
            'coin_name' => 'required|string',
            'coin_code' => 'required|string',
            'coin_wallet' => 'nullable|string',
            'sell_price' => 'nullable|numeric',
            'buy_price' => 'nullable|numeric',
            'coin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ],[
            'coin_name.required' => 'Coin name is required',
            'coin_name.string' => 'Coin name must be a string',
            'coin_code.required' => 'Coin code is required',
            'coin_code.string' => 'Coin code must be a string',
            'coin_wallet.required' => 'Coin wallet is required',
            'coin_wallet.string' => 'Coin wallet must be a string',
            'sell_price.numeric' => 'Sell price must be a number',
            'buy_price.numeric' => 'Buy price must be a number',
            'coin_image.image' => 'Coin image must be an image',
            'coin_image.mimes' => 'Coin image must be a file of type: jpeg, png, jpg, gif, svg',
        ]);
        $validated = $request->all();

        if ($request->hasFile('coin_image')) {
            $imageName = time() . '.' . $request->coin_image->extension();
            $request->coin_image->move(public_path('coins'), $imageName);
            $validated['coin_image'] = $imageName;
        }

        Coins::create($validated);

        return redirect()->route('coins.index')->with('success','Coins has been created successfully.');
    }

    /**
     * Display the specified resource.
     *  * @param  \App\Coins  $Coins
    * @return \Illuminate\Http\Response
     */
    public function show(Coins $coin)
    {
        //
        return view('admin.coins.show',compact('coin'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Coins $coins
     * @return \Illuminate\Http\Response
     */
    public function edit(Coins $coin)
    {
        //
        return view('admin.coins.edit',compact('coin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coins $coin)
    {
        $request->validate([
            'coin_name' => 'required|string',
            'coin_code' => 'required|string',
            'coin_wallet' => 'nullable|required|string',
            'sell_price' => 'nullable|numeric',
            'buy_price' => 'nullable|numeric',
            'coin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ],[
            'coin_name.required' => 'Coin name is required',
            'coin_name.string' => 'Coin name must be a string',
            'coin_code.required' => 'Coin code is required',
            'coin_code.string' => 'Coin code must be a string',
            'coin_wallet.required' => 'Coin wallet is required',
            'coin_wallet.string' => 'Coin wallet must be a string',
            'sell_price.numeric' => 'Sell price must be a number',
            'buy_price.numeric' => 'Buy price must be a number',
            'coin_image.image' => 'Coin image must be an image',
            'coin_image.mimes' => 'Coin image must be a file of type: jpeg, png, jpg, gif, svg, webp',
        ]);
        $validated = $request->except('coin_image');
        if ($request->hasFile('coin_image')) {
            if(file_exists(public_path('coins/' . $coin->coin_image))){
                unlink(public_path('coins/' . $coin->coin_image));
            }
            $imageName = time() . '.' . $request->coin_image->extension();
            $request->coin_image->move(public_path('coins'), $imageName);
            $validated['coin_image'] = $imageName;
            
        }
        $coin->fill($validated)->save();

        

        return redirect()->route('coins.index')->with('success','Coins Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coins $coin)
    {
       

        //delete image from public/coins directory
        if (file_exists(public_path('coins/' . $coin->coin_image))) {
            unlink(public_path('coins/' . $coin->coin_image));
        }
         //
        $coin->delete();
        return redirect()->route('coins.index')->with('success','Coins has been deleted successfully');
    }
}
