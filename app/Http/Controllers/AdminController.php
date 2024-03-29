<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;

use App\Models\Product;

use App\Models\Order;

use App\Models\Blog;

use App\Models\contactus;

use App\Models\User;

use PDF;

use Notification;

use App\Notifications\SendEmailNotification;


class AdminController extends Controller
{
    public function view_catagory()
    {
        $data=catagory::all();
        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request)
    {
         $data=new catagory;

         $data->catagory_name=$request->catagory;

         $data->save();

         return redirect()->back()->with('message', 'Category Added Successfully');
    
    }

    public function delete_catagory($id)
    {
        $data=catagory::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $catagory=catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request)
    {
        $product=new product;

        $product->title=$request->title;

        $product->description=$request->description;

        $product->price=$request->price;

        $product->quantity=$request->quantity;

        $product->discount_price=$request->dis_price;

        $product->catagory=$request->catagory;



        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image=$imagename;


        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');

    }

    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product=product::find($id);
        $catagory=catagory::all();
        return view('admin.update_product',compact('product','catagory'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);

        $product->title=$request->title;

        $product->description=$request->description;

        $product->price=$request->price;

        $product->discount_price=$request->dis_price;

        $product->catagory=$request->catagory;

        $product->quantity=$request->quantity;


        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);
    
            $product->image=$imagename;
        }



        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully');
    }


    public function order()
    {
        $order=order::all();

        return view('admin.order',compact('order'));  
    }

    public function delivered($id)
    {
        $order=order::find($id);

        $order->delivery_status="Delivered";

        $order->payment_status="Paid";

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order=order::find($id);

        $pdf=PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order=order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request , $id)
    {
        $order=order::find($id);

        $details = [
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,

        ];

        Notification::send($order,new SendEmailNotification($details));
    }

    public function searchdata(Request $request)
    {
        $searchText=$request->search;

        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('address','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->orWhere('price','LIKE',"%$searchText%")->orWhere('payment_status','LIKE',"%$searchText%")->orWhere('delivery_status','LIKE',"%$searchText%")->get();

        return view('admin.order',compact('order'));
    }

    public function view_blog()
    {
        return view('admin.blog');
    }

    public function add_blog(Request $request)
    {
        $blogs=new Blog;

        $blogs->title=$request->title;

        $blogs->description=$request->description;


        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('blog',$imagename);

        $blogs->image=$imagename;


        $blogs->save();

        return redirect()->back()->with('message','Blog Added Successfully');

    }

    public function show_blog()
    {
        $blogs=Blog::all();
        return view('admin.show_blog',compact('blogs'));
    }

    public function delete_blog($id)
    {
        $blogs=Blog::find($id);

        $blogs->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function show_contactus()
    {
        $contactus=contactus::all();
        return view('admin.show_contactus',compact('contactus'));
    }

    public function update_blog($id)
    {
        $blogs=Blog::find($id);
        return view('admin.update_blog',compact('blogs'));
    }

    public function update_blog_confirm(Request $request,$id)
    {
        $blogs=Blog::find($id);

        $blogs->title=$request->title;

        $blogs->description=$request->description;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('blogs',$imagename);
    
            $blogs->image=$imagename;
        }


        $blogs->save();

        return redirect()->back()->with('message','Blog Updated Successfully');
    }

    public function user_management()
    {
        $user = user::where('usertype', 0)->get();
        return view('admin.users',compact('user'));
    }

    public function delete_user($id)
    {
        $user=user::find($id);

        $user->delete();

        return redirect()->back()->with('message','User Removed Successfully');
    }

}