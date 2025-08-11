<?php

namespace App\Http\Controllers;

use App\Models\Paddy;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyPaddyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // List paddies added by the logged-in user and their related orders
   public function index()
{
    $paddies = Paddy::where('added_by', auth()->id())->get();

    // Assuming this is farmer's view, get orders placed for this farmer:
    $orders = Order::where('farmer_id', auth()->id())->get();

    return view('mypaddies', compact('paddies', 'orders'));
}




    // Show edit form for a paddy
    public function edit($id)
    {
        $paddy = Paddy::where('id', $id)->where('added_by', Auth::id())->firstOrFail();
        return view('mypaddies.edit', compact('paddy'));
    }

    // Update a paddy
    public function update(Request $request, $id)
    {
        $paddy = Paddy::where('id', $id)->where('added_by', Auth::id())->firstOrFail();

        $request->validate([
             'paddy_id' => 'required|exists:paddies,id',
            'product_name' => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|min:0',
            'quantity'     => 'required|numeric|min:0.1',
            'badge'        => 'nullable|string|max:50',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $paddy->product_name = $request->product_name;
        $paddy->description = $request->description;
        $paddy->price = $request->price;
        $paddy->quantity = $request->quantity;
        $paddy->badge = $request->badge;

        if ($request->hasFile('image')) {
            if ($paddy->image && Storage::disk('public')->exists($paddy->image)) {
                Storage::disk('public')->delete($paddy->image);
            }
            $paddy->image = $request->file('image')->store('paddies', 'public');
        }

        $paddy->save();

        return redirect()->route('mypaddies')->with('success', 'Paddy updated successfully!');
    }

    // Delete a paddy
    public function destroy($id)
    {
        $paddy = Paddy::where('id', $id)->where('added_by', Auth::id())->firstOrFail();

        if ($paddy->image && Storage::disk('public')->exists($paddy->image)) {
            Storage::disk('public')->delete($paddy->image);
        }

        $paddy->delete();

        return redirect()->route('mypaddies')->with('success', 'Paddy deleted successfully!');
    }
}
