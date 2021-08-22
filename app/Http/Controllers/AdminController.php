<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Fooodchef;

class AdminController extends Controller
{
    //user
    function user()
    {
        //return view('admin.user');
        $data = User::all();
        return view('admin.user',compact("data"));
    }
   public function deleteuser($id)
    {
        
        $data = User::find($id);
        $data->delete();
        // return response()->json(['success'=>'Record has been deleted']);
        return redirect()->back();
    }
    //food

    public function deletemenu($id)
    {
        
        $data = Food::find($id);
        $data->delete();
        // return response()->json(['success'=>'Record has been deleted']);
        
        return redirect()->back();
    }
    function foodmenu()
    {
        $data = Food::all();
        return view('admin.foodmenu',compact('data'));
    }
    public function updatefoodmenu($id)
    {
        $data = Food::find($id);
        return view("admin.updatefoodmenu",compact("data"));

    }
    public function update(Request $request,$id)
    {
        $data = Food::find($id);
        if($request->hasFile('image')){
            $file_2 = $request->file('image');

            if($file_2->move('upload', $file_2->getClientOriginalName())){
                
                $data->title = $request->title;
                $data->price = $request->price;
                $data->description = $request->description;
                $data->image = $file_2->getClientOriginalName();

                $data->save();
                $request->session()->flash('update','FoodItem update successfully');
                return redirect('foodmenu');
                //return redirect()->back();
            }
        }

    }
    function upload(Request $request)
    {
        
        $data = new food;

        // $image=$request->image;
        // $imagename=time().'.'.$image->getClientOriginalExtension();
        //             $request->image->move('foodimage',$imagename);
        if($request->hasFile('image')){
            $file_2 = $request->file('image');

            if($file_2->move('upload', $file_2->getClientOriginalName())){
                
                $data->title = $request->title;
                $data->price = $request->price;
                $data->description = $request->description;
                $data->image = $file_2->getClientOriginalName();

                $data->save();
                session()->flash('upload','Food Item Entered Successfully');
                return redirect('foodmenu');
                return redirect()->back();
            }
        }


    }
    //reservation
    function reservation(Request $request)
    {
        
        $data = new reservation;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();
        $request->session()->flash('reservation','Table Reservation successfully Done');
        return redirect('/');
       // return redirect()->back();
    }
    public function viewreservation()
    {
        $data = Reservation::all();
        return view("admin.adminreservation",compact("data"));

    }
    public function viewchef()
    {
        $data = Fooodchef::all();
        return view('admin.adminchef',compact("data"));
    }
    function uploadchefinfo(Request $request)
    {
        
        $data = new fooodchef;

        
        if($request->hasFile('image')){
            $file_2 = $request->file('image');

            if($file_2->move('chefimage', $file_2->getClientOriginalName())){
                
                $data->name = $request->name;
                $data->speciality = $request->speciality;
                $data->image = $file_2->getClientOriginalName();
                $data->save();
                session()->flash('addchef','Chef Info Entered Successfully');
                return redirect('viewchef');

               // return redirect()->back();
            }
        }
    }
    public function deletechef($id)
    {
        
        $data = Fooodchef::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updatechefview($id)
    {
        $data2 = Fooodchef::find($id);
        return view("admin.updatechef",compact("data2"));

    }
    public function updatechef(Request $request,$id)
    {
        $data2 = Fooodchef::find($id);
        if($request->hasFile('image')){
            $file_2 = $request->file('image');

            if($file_2->move('chefimage', $file_2->getClientOriginalName())){
                
                $data2->name = $request->name;
                $data2->speciality = $request->speciality;
                $data2->image = $file_2->getClientOriginalName();

                $data2->save();
                $request->session()->flash('updatechef','Chef Info update successfully');
                return redirect('viewchef');
               //return redirect()->back();
            }
        }

    }
    
}

