<?php

namespace App\Http\Controllers;

use App\Models\add_to_cart;
use App\Models\admin;
use App\Models\offer_discount;
use App\Models\orders;
use App\Models\products;
use App\Models\registration;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class admin_controller extends Controller
{
    public function admin_dashboard()
    {
        $result2 = admin::where('Email', session('email'))->first();
        $t_user = registration::select()->count();
        $a_user = registration::where('Status','Active')->count();
        $i_user = registration::where('Status','Active')->count();
        $t_products = products::select()->count();
        $t_orders = orders::select()->count();

        $arr = ['t_user'=>$t_user,'a_user'=>$a_user,'i_user'=>$i_user,'t_products'=>$t_products,'t_orders'=>$t_orders];
        return view('admin/admin_dashboard',compact('result2','arr'));
    }

    public function display_user()
    {
        $u = registration::select()->get();
        Return view('admin/user',compact('u'));
    }

    public function user_view_more($email)
    {
        $person = registration::where('Email',$email)->first();
        return view('admin/user_view_more',compact('person'));
    }

    public function user_edit($email)
    {
        $data = registration::where('Email',$email)->first();
        return view('admin/user_edit',compact('data'));
    }

    public function user_update(Request $req)
    {
        $req->validate([
            'first_name'=>'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'last_name'=>'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'mobile_no'=>'nullable|min:10|max:10',
            'address'=>'nullable|min:3',
            'city'=>'nullable|regex:/(^[a-zA-Z]*$)/u',
            'pin_code'=>'nullable|min:6|max:6',
            'email'=>'email',
            'bank_name'=>'nullable|regex:/(^[a-zA-Z]*$)/u',
            'account_no'=>'nullable|regex:/(^\d{6,20}$)/u',
            'ifsc_code'=>'nullable|regex:/(^[A-Z]{4}[0][A-Z0-9]{6}$)/u',
            'profile_picture'=>'mimes:jpg,png'
        ],[
            'first_name.required'=>'Firstname field cannot be empy',
            'first_name.min'=>'Firstname contain at least 2 character',
            'first_name.regex'=>'Enter valid name',

            'last_name.required'=>'Lastname field cannot be empy',
            'last_name.min'=>'Lastname contain at least 2 character',
            'last_name.regex'=>'Enter valid name',

            'address.min'=>'Address contain atleast 3 letter',

            'mobile_no.min'=>'Mobile no contain 10 digit only',
            'mobile_no.max'=>'Mobile no contain 10 digit only',

            'pin_code.min'=>'Pin code contain 6 digit only',
            'pin_code.max'=>'Pin code contain 6 digit only',

            'city.regex'=>'Enter valid city name',

            'bank_name.regex'=>'Enter valid bank name',

            'account_no.regex'=>'Account number contain 6/8/9/12/20 digit',

            'ifsc_code.regex'=>'Four uppercase alphabet characters (bank code),single zero character (reserved for future use), six uppercase alphabetical characters or digits (branch code)',

            'profile_picture.mimes'=>'Please select oly JPG or PNG file',
        ]);

        $data = registration::where('Email',$req->email)->first();
        if($req->hasFile('profile_picture'))
        {
            $file_path = "images/registration/".$data['Profile_picture'];
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $file_name = uniqid().$req->profile_picture->getClientOriginalName();
            $req->profile_picture->move('images/registration',$file_name);
            $data = registration::where('Email',$req->email)->update(array('First_name'=>$req->first_name,'Last_name'=>$req->last_name,'Mobile_no'=>$req->mobile_no,'Address'=>$req->address,
            'City'=>$req->city,'Pin_code'=>$req->pin_code,'Bank_name'=>$req->bank_name,'Account_no'=>$req->account_no,'Ifsc_code'=>$req->ifsc_code,
            'Profile_picture'=>$file_name));
        }
        else
        {
            $data = registration::where('Email',$req->email)->update(array('First_name'=>$req->first_name,'Last_name'=>$req->last_name,'Mobile_no'=>$req->mobile_no,'Address'=>$req->address,
            'City'=>$req->city,'Pin_code'=>$req->pin_code,'Bank_name'=>$req->bank_name,'Account_no'=>$req->account_no,'Ifsc_code'=>$req->ifsc_code));
        }
        session()->flash('user_edit','User Edited Successfully');
        Return $this->display_user();
    }

    public function user_delete($email)
    {
        $data = registration::where('Email',$email)->update(array('Status' => 'Deleted'));
        session()->flash('user_delete','User Deleted Successfully');
        return $this->display_user();
    }

    public function user_active($email)
    {
        $user = registration::where('Email',$email)->first();
            $data = ['email'=>$email,'name'=>$user->first_name,'token'=>$user->Activation_token];
            Mail::send('user/user_send_email_view',['data'=>$data],function($message) use($data){
                $message->to($data['email'],$data['name'])
                                ->subject('Activate Account');
                $message->from('kkalariya174@rku.ac.in','Kalariya Kris');
            });
            session()->flash('user_active','User activated Successfully');
        return $this->display_user();
    }

    public function user_deactive($email)
    {
        $data = registration::where('Email',$email)->update(array('Status' => 'Inactive'));
        session()->flash('user_deactive','User Deactivated Successfully');
        return $this->display_user();
    }

    public function user_add()
    {
        return view('admin/user_add');
    }

    public function user_insert(Request $req)
    {
        $req->validate([
            'first_name'=>'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'last_name'=>'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'mobile_no'=>'nullable|min:10|max:10',
            'address'=>'nullable|min:3',
            'city'=>'nullable|regex:/(^[a-zA-Z]*$)/u',
            'pin_code'=>'nullable|min:6|max:6',
            'email'=>'email',
            'password'=>'required|regex:/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$)/u',
            'bank_name'=>'nullable|regex:/(^[a-zA-Z]*$)/u',
            'account_no'=>'nullable|regex:/(^\d{6,20}$)/u',
            'ifsc_code'=>'nullable|regex:/(^[A-Z]{4}[0][A-Z0-9]{6}$)/u',
            'profile_picture'=>'mimes:jpg,png'
        ],[
            'first_name.required'=>'Firstname field cannot be empy',
            'first_name.min'=>'Firstname contain at least 2 character',
            'first_name.regex'=>'Enter valid name',

            'last_name.required'=>'Lastname field cannot be empy',
            'last_name.min'=>'Lastname contain at least 2 character',
            'last_name.regex'=>'Enter valid name',

            'address.min'=>'Address contain atleast 3 letter',

            'mobile_no.min'=>'Mobile no contain 10 digit only',
            'mobile_no.max'=>'Mobile no contain 10 digit only',

            'pin_code.min'=>'Pin code contain 6 digit only',
            'pin_code.max'=>'Pin code contain 6 digit only',

            'city.regex'=>'Enter valid city name',

            'bank_name.regex'=>'Enter valid bank name',

            'password.required'=>'Password field cannot be empy',
            'password.regex'=>'Password contain minimum eight characters,one uppercase letter, one lowercase letter, one number and one special character',

            'account_no.regex'=>'Account number contain 6/8/9/12/20 digit',

            'ifsc_code.regex'=>'Four uppercase alphabet characters (bank code),single zero character (reserved for future use), six uppercase alphabetical characters or digits (branch code)',

            'profile_picture.mimes'=>'Please select oly JPG or PNG file',
        ]);
        if($req->has('profile_picture')){
            $file_name = uniqid().$req->profile_picture->getClientOriginalName();
            $req->profile_picture->move('Images/registration',$file_name);
            }
            else{
                $file_name = 'default.png';
            }
    
            $reg_ins = new registration();
            $reg_ins->First_name=$req->first_name;
            $reg_ins->Last_name=$req->last_name;
            $reg_ins->Email=$req->email;
            $reg_ins->Password=$req->password;
            $reg_ins->Profile_picture=$file_name;
            $reg_ins->Activation_token=Str::random(60);
            $reg_ins->Status='Inactive';
    
            if($reg_ins->save())
            {
                session()->flash('success','Registration Successfully');
                $token = registration::where('Email',$req->email)->first();
                $data = ['email'=>$req->email,'name'=>$req->first_name,'token'=>$token->Activation_token];
                Mail::send('user/user_send_email_view',['data'=>$data],function($message) use($data){
                    $message->to($data['email'],$data['name'])
                                    ->subject('Activate Account');
                    $message->from('kkalariya174@rku.ac.in','Kalariya Kris');
                });
            }
            else{
                session()->flash('error',"Registration Failed");
            }
            session()->flash('user_add','User add Successfully');
        return $this->display_user();
    }

    public function display_products()
    {
        $p = products::select()->get();
        Return view('admin/product',compact('p'));
    }

    public function product_view_more($id)
    {
        $product = products::where('Pro_id',$id)->first();
        return view('admin/product_view_more',compact('product'));
    }

    public function product_edit($id)
    {
        $data = products::where('Pro_id',$id)->first();
        return view('admin/product_edit',compact('data'));
    }

    public function product_update(Request $req)
    {
        $req->validate([
            'product_name'=>'required|regex:/(^[a-zA-Z.\- ]*$)/u',
            'product_type'=>'required|regex:/(^[a-zA-Z]*$)/u',
            'product_price'=>'required|regex:/(^[0-9]*$)/u',
            'color'=>'required|regex:/(^[a-zA-Z.\- ]*$)/u',
            'ava_size_6'=>'nullable|regex:/(^[0-9]*$)/u',
            'ava_size_7'=>'nullable|regex:/(^[0-9]*$)/u',
            'ava_size_8'=>'nullable|regex:/(^[0-9]*$)/u',
            'ava_size_9'=>'nullable|regex:/(^[0-9]*$)/u',
            'pro_img'=>'mimes:jpg,png',
        ],[
            'product_name.required'=>'Firstname field cannot be empy',
            'product_name.regex'=>'Enter valid name',

            'product_type.required'=>'Lastname field cannot be empy',
            'product_type.regex'=>'Enter valid name',

            // 'gender.required'=>'Gender field cannot be empy',
            // 'gender.regex'=>'Enter valid gender',

            'product_price.required'=>'Product price field cannot be empy',
            'product_price.regex'=>'Enter valid price',

            'color.required'=>'Color field cannot be empy',
            'color.regex'=>'Enter valid color',

            'ava_size_6.regex'=>'Enter valid size',
            'ava_size_7.regex'=>'Enter valid size',
            'ava_size_8.regex'=>'Enter valid size',
            'ava_size_9.regex'=>'Enter valid size',

            'pro_img.mimes'=>'Please select oly JPG or PNG file',
        ]);

        $data = products::where('Pro_id',$req->product_id)->first();
        if($req->hasFile('pro_img'))
        {
            // $file_path = "images/men/".$data['Pro_img'];
            // if(File::exists($file_path)){
            //     // File::delete($file_path);
            // }
            $file_name = uniqid().$req->pro_img->getClientOriginalName();
            $req->pro_img->move('images/men',$file_name);
            $data = products::where('Pro_id',$req->product_id)->update(array('Pro_name'=>$req->product_name,'Pro_type'=>$req->product_type,'Pro_price'=>$req->product_price,'Color'=>$req->color,
            'Ava_size_6'=>$req->ava_size_6,'Ava_size_7'=>$req->ava_size_7,'Ava_size_8'=>$req->ava_size_8,'Ava_size_9'=>$req->ava_size_9,
            'Pro_img'=>$file_name));
        }
        else
        {
            $data = products::where('Pro_id',$req->product_id)->update(array('Pro_name'=>$req->product_name,'Pro_type'=>$req->product_type,'Pro_price'=>$req->product_price,'Color'=>$req->color,
            'Ava_size_6'=>$req->ava_size_6,'Ava_size_7'=>$req->ava_size_7,'Ava_size_8'=>$req->ava_size_8,'Ava_size_9'=>$req->ava_size_9));
        }
        session()->flash('product_edit','Product Edit Successfully');
        Return $this->display_products();
    }

    public function product_delete($id)
    {
        $data = products::where('Pro_id',$id)->update(array('Product_status' => 'Deleted'));
        session()->flash('product_delete','Product Deleted Successfully');
        return $this->display_products();
    }

    public function product_deactive($id)
    {
        $data = products::where('Pro_id',$id)->update(array('Product_status' => 'Unavailable'));
        session()->flash('product_deactive','Product Deactive Successfully');
        return $this->display_products();
    }

    public function product_active($id)
    {
        $data = products::where('Pro_id',$id)->update(array('Product_status' => 'Available'));
        session()->flash('product_active','Product Active Successfully');
        return $this->display_products();
    }
    public function product_add()
    {
        return view('admin/product_add');
    }

    public function product_insert(Request $req)
    {
        $req->validate([
            'product_name'=>'required|regex:/(^[a-zA-Z.\- ]*$)/u',
            'product_type'=>'required|regex:/(^[a-zA-Z]*$)/u',
            'gender' => 'required|regex:/(^[a-zA-Z]*$)/u',
            'product_price'=>'required|regex:/(^[0-9]*$)/u',
            'color'=>'required|regex:/(^[a-zA-Z.\- ]*$)/u',
            'ava_size_6'=>'required|regex:/(^[0-9]*$)/u',
            'ava_size_7'=>'required|regex:/(^[0-9]*$)/u',
            'ava_size_8'=>'required|regex:/(^[0-9]*$)/u',
            'ava_size_9'=>'required|regex:/(^[0-9]*$)/u',
            'pro_img'=>'required|mimes:jpg,png',
            'other_img1'=>'required|mimes:jpg,png',
            'other_img2'=>'required|mimes:jpg,png',
            'other_img3'=>'required|mimes:jpg,png',
            'other_img4'=>'mimes:jpg,png',
        ],[
            'product_name.required'=>'Firstname field cannot be empy',
            'product_name.regex'=>'Enter valid name',

            'product_type.required'=>'Lastname field cannot be empy',
            'product_type.regex'=>'Enter valid name',

            'gender.required'=>'Gender field cannot be empy',
            'gender.regex'=>'Enter valid gender',

            'product_price.required'=>'Product price field cannot be empy',
            'product_price.regex'=>'Enter valid price',

            'color.required'=>'Color field cannot be empy',
            'color.regex'=>'Enter valid color',

            'ava_size_6.regex'=>'Enter valid size',
            'ava_size_7.regex'=>'Enter valid size',
            'ava_size_8.regex'=>'Enter valid size',
            'ava_size_9.regex'=>'Enter valid size',

            'pro_img.mimes'=>'Please select oly JPG or PNG file',
            'pro_img.required'=>'Please select product image',
            'other_img1.required'=>'Please select other image1',
            'other_img2.required'=>'Please select other image2',
            'other_img3.required'=>'Please select other image3',
            'other_img4.required'=>'Please select other image4',
            'other_img1.mimes'=>'Please select oly JPG or PNG file',
            'other_img2.mimes'=>'Please select oly JPG or PNG file',
            'other_img3.mimes'=>'Please select oly JPG or PNG file',
            'other_img4.mimes'=>'Please select oly JPG or PNG file',
        ]);
            $file_name = uniqid().$req->pro_img->getClientOriginalName();
            $file_name1 = uniqid().$req->other_img1->getClientOriginalName();
            $file_name2 = uniqid().$req->other_img2->getClientOriginalName();
            $file_name3 = uniqid().$req->other_img3->getClientOriginalName();
            $file_name4 = uniqid().$req->other_img4->getClientOriginalName();
            $req->pro_img->move('Images/men',$file_name);
            $req->other_img1->move('Images/men',$file_name1);
            $req->other_img2->move('Images/men',$file_name2);
            $req->other_img3->move('Images/men',$file_name3);
            $req->other_img4->move('Images/men',$file_name4);
            
    
            $reg_ins = new products();
            $reg_ins->Pro_name=$req->product_name;
            $reg_ins->Pro_type=$req->product_type;
            $reg_ins->Gender=$req->gender;
            $reg_ins->Pro_price=$req->product_price;
            $reg_ins->Color=$req->color;
            $reg_ins->Ava_size_6 = $req->ava_size_6;
            $reg_ins->Ava_size_7 = $req->ava_size_7;
            $reg_ins->Ava_size_8 = $req->ava_size_8;
            $reg_ins->Ava_size_9= $req->ava_size_9;
            $reg_ins->Pro_img=$file_name;
            $reg_ins->Other_img1=$file_name1;
            $reg_ins->Other_img2=$file_name2;
            $reg_ins->Other_img3=$file_name3;
            $reg_ins->Other_img4=$file_name4;
            $reg_ins->Product_status='Available';
    
            if($reg_ins->save())
            {
                session()->flash('product_add','Product add Successfully');
                return $this->display_products();
            }
            else{
                session()->flash('product_not_add',"Product add Failed");
            }
    }   

    public function display_orders()
    {
        $o = orders::select()->get();
        Return view('admin/order',compact('o'));
    }

    public function order_delete($id)
    {
        $data = orders::where('Order_id',$id)->delete();
        session()->flash('order_delete','Product Deleted Successfully');
        return $this->display_orders();
    }

    public function order_notdeliver($id)
    {
        $data = orders::where('Order_id',$id)->update(array('Order_status' => 'Not delivered'));
        session()->flash('order_notdeliver','Product status updated Successfully');
        return $this->display_orders();
    }

    public function order_deliver($id)
    {
        $data = orders::where('Order_id',$id)->update(array('Order_status' => 'Delivered'));
        session()->flash('order_deliver','Product status updated Successfully');
        return $this->display_orders();
    }

    
    public function display_add_to_cart()
    {
        $a = add_to_cart::select()->get();
        Return view('admin/add_to_cart',compact('a'));
    }

    public function add_to_cart_delete($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->delete();
        session()->flash('add_to_cart_delete','Product Deleted Successfully from your cart');
        return $this->display_add_to_cart   ();
    }

    public function display_slider()
    {
        $s = slider::select()->get();
        Return view('admin/slider',compact('s'));
    }
    
    public function slider_edit($id)
    {
        $data = slider::where('id',$id)->first();
        return view('admin/slider_edit',compact('data'));
    }

    public function slider_update(Request $req)
    {
        $req->validate([
            'slider_img'=>'mimes:jpg,png',
        ],[
            'slider_img.mimes'=>'Please select oly JPG or PNG file',
        ]);

        $data = slider::where('id',$req->slider_id)->first();
        if($req->hasFile('slider_img'))
        {
            $file_path = "images/slider/".$data['Image'];
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $file_name = uniqid().$req->slider_img->getClientOriginalName();
            $req->slider_img->move('images/slider',$file_name);
            $data = slider::where('id',$req->slider_id)->update(array(
            'Image'=>$file_name));
        }
        session()->flash('slider_edit','Slider Image Edit Successfully');
        Return $this->display_slider();
    }

    public function slider_delete($id)
    {
        $data = slider::where('id',$id)->delete();
        session()->flash('slider_delete','Slider Image Deleted Successfully');
        return $this->display_slider();
    }

    public function slider_add()
    {
        return view('admin/slider_add');
    }

    public function slider_insert(Request $req)
    {
        $req->validate([
            'slider_img'=>'required|mimes:jpg,png',
        ],[
            'slider_img.mimes'=>'Please select oly JPG or PNG file',
            'slider_img.required'=>'Please select product image',
        ]);
            $file_name = uniqid().$req->slider_img->getClientOriginalName();
            $req->slider_img->move('Images/slider',$file_name);
            
    
            $reg_ins = new slider();
            $reg_ins->Image=$file_name;
    
            if($reg_ins->save())
            {
                session()->flash('slider_add','Product add Successfully');
                return $this->display_slider();
            }
    }   

    // public function display_offer_discount()
    // {
    //     $d = offer_discount::select()->get();
    //     Return view('admin/offer_discount',compact('d'));
    // }

    public function admin_profile()
    {
        $data = admin::where('Email',session('email'))->first();
        return view('admin/admin_edit_profile',compact('data'));
    }

    public function admin_update(Request $req)
    {
        $req->validate([
            'profile_picture'=>'mimes:jpg,png'
        ],[
            'profile_picture.mimes'=>'Please select oly JPG or PNG file',
        ]);
        $data = admin::where('Email',session('email'))->first();
        if($req->hasFile('profile_picture'))
        {
            $file_path = "images/admin/".$data['Profile_picture'];
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $file_name = uniqid().$req->profile_picture->getClientOriginalName();
            $req->profile_picture->move('images/admin',$file_name);
            $data = admin::where('Email',$req->email)->update(array(
            'Profile_picture'=>$file_name));
        }
        return $this->admin_edit_profile();
    }

    public function admin_logout()
    {
        session()->forget('email');
        session()->forget('password');
        return redirect('login');
    }
}
