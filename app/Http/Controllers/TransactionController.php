<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Food;
 
class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Food::all();
        return view('admin.transaction', compact('transactions'));
    }
 
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $transactions = Food::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "name" => $transactions->name,
                "price" => $transactions->price,
                "quantity" => 1
            ];
        }
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'transaction add to cart successfully!');
    }
 
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'transaction successfully removed!');
        }
    }
}