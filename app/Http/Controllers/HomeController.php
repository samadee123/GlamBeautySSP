<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Blog;

use App\Models\Favourite;

use App\Models\contactus;

use App\Models\Catagory;

use Session;

use Stripe;


class HomeController extends Controller
{

    public function index()
    {
        $product=Product::paginate(8);
        return view('home.userpage',compact('product'));
    }

    public function redirect() 
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_product=product::all()->count();

            $total_order=order::all()->count();

            $total_user=user::all()->count();

            $order=order::all();

            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status','=','Delivered')->get()->count();

            $total_processing=order::where('delivery_status','=','Processing')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));

        }

        else
        {
            $product=Product::paginate(8);
            return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $userid=$user->id;

            $product=product::find($id);

            $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();

                $quantity=$cart->quantity;

                $cart->quantity=$quantity + $request->quantity;

                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $cart->quantity;
                }

                else
                {
                    $cart->price=$product->price * $cart->quantity;
                }

                $cart->save();

                return redirect()->back()->with('message','Product Added Successfullly');
            }

            else
            {
                $cart=new cart;

                $cart->name=$user->name;

                $cart->email=$user->email;

                $cart->phone=$user->phone;

                $cart->address=$user->address;

                $cart->user_id=$user->id;



                $cart->product_title=$product->title;

                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $request->quantity;
                }

                else
                {
                    $cart->price=$product->price * $request->quantity;
                }
	
            
                $cart->image=$product->image;	

                $cart->Product_id=$product->id;	

                $cart->quantity=$request->quantity;	

                $cart->save();

                return redirect()->back()->with('message','Product Added Successfullly');;

                }

        }

        else
        {
            return redirect('login');
        }
    }
    
    public function show_cart()
    {

        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order($totalproduct)
    {

        if($totalproduct==0)

        {

             return redirect()->back()->with('message','Please Add Some Products to the Cart');
        }

        else

        {

        $user=Auth::user();

        $userid=$user->id;


        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {

            $order=new order;

            $order->name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;



            $order->product_title=$data->product_title;

            $order->price=$data->price;

            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->Product_id;

            $order->payment_status='Cash on Delivery';

            $order->delivery_status='Processing';

            $order->save();


            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();

        }

        return redirect()->back()->with('message','We Have Received Your Order. We Will Connect With You Soon...');

        }

    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }   


    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "lkr",
                "source" => $request->stripeToken,
                "description" => "Thanks For Your Payment" 
        ]);

        $user=Auth::user();

        $userid=$user->id;


        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {

            $order=new order;

            $order->name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;



            $order->product_title=$data->product_title;

            $order->price=$data->price;

            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->Product_id;

            $order->payment_status='Paid';

            $order->delivery_status='Processing';

            $order->save();


            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();

        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function shop()
    {
        $product=Product::all();
        return view('home.shop',compact('product'));
    }

    public function allblogs()
    {
        $blogs=Blog::all();
        return view('home.allblogs',compact('blogs'));
    }

    public function blogdetails($id)
    {
        $blogs=Blog::find($id);
        return view('home.blogdetails',compact('blogs'));
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);

        $order->delivery_status='Order Cancelled';

        $order->save();
        return redirect()->back();
    }

    public function show_fav()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
         
            $favourite=favourite::where('user_id','=',$id)->get();

            return view('home.favourites',compact('favourite'));
        }

        else
        {
            return redirect('login');
        }
           
    }

    public function add_fav($id)
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $product=product::find($id);

            $favourite=new favourite();

            $favourite->name=$user->name;

            $favourite->email=$user->email;

            $favourite->phone=$user->phone;

            $favourite->address=$user->address;

            $favourite->user_id=$user->id;

            $favourite->product_title=$product->title;

            if($product->discount_price!=null)
            {
                $favourite->price=$product->discount_price;
            }

            else
            {
                $favourite->price=$product->price;
            }


            $favourite->image=$product->image;

            $favourite->product_id=$product->id;

            $favourite->save();

            return redirect()->back();

        }

        else 
        {
            return redirect('login');
        }
    }

    public function remove_fav($id)
    {
        $favourite=favourite::find($id);

        $favourite->delete();

        return redirect()->back();
    }

    public function contact_us()
    {
        return view('home.contactus');
    }

    public function add_contactus(Request $request)
    {
        $contactus=new contactus;

        $contactus->name=$request->name;

        $contactus->email=$request->email;

        $contactus->message=$request->message;

        $contactus->save();

        return redirect()->back();

    }

    public function product_search(Request $request)
    {
        $search_text=$request->search;

        $product=product::where('title','LIKE',"%$search_text%")->get();

        return view('home.shop',compact('product'));
    }

    public function skin_filter()
    {
        $product = product::where('catagory', 'Skin Care')->get();

        return view('home.shop', compact('product'));

    }

    public function hair_filter()
    {
        $product = product::where('catagory', 'Hair Care')->get();

        return view('home.shop', compact('product'));
    }

    public function makeup_filter()
    {
        $product = product::where('catagory', 'Makeup')->get();

        return view('home.shop', compact('product'));
    }

    public function fragrance_filter()
    {
        $product = product::where('catagory', 'Fragrance')->get();

        return view('home.shop', compact('product'));
    }
    
    public function skinhair_filter()
    {
        $product = Product::whereHas('categories', function ($query) {
            $query->whereIn('catagory', ['Skin Care', 'Hair Care']);
        })->get();

        return view('home.shop', compact('product'));
    }

    public function firstprice_filter()
    {
        $product = Product::whereBetween('price', [0, 5000])->get();

        return view('home.shop', compact('product'));

    }

    public function secondprice_filter()
    {
        $product = Product::whereBetween('price', [5000, 15000])->get();

        return view('home.shop', compact('product'));

    }

    public function thirdprice_filter()
    {
        $product = Product::whereBetween('price', [15000, 30000])->get();

        return view('home.shop', compact('product'));

    }

    public function fourthprice_filter()
    {
        $product = Product::whereBetween('price', [30000, 100000])->get();

        return view('home.shop', compact('product'));

    }

    public function lowtohigh_filter()
    {
        $product = Product::orderBy('price', 'asc')->get();

        return view('home.shop', compact('product'));
    }
}
