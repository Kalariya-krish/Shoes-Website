<?php

namespace App\Http\Controllers;

use App\Models\add_to_cart;
use App\Models\admin;
use App\Models\blog;
use App\Models\orders;
use App\Models\products;
use App\Models\registration;
use App\Models\DeleteToken;
use App\Models\slider;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;


class website_controller extends Controller
{
    public function fetch_index(){
        $data = slider::select()->get();
        $all_product = products::select()->get();
        $blog = blog::select()->get();
        Return view('normal/index',compact('data','all_product','blog'));
    }
    public function fetch_index2(){
        $data = slider::select()->get();
        $registrationData = registration::where('Email',session('email'))->first();
        $all_product = products::select()->get();
        $blog = blog::select()->get();
        return view('user/user_index',compact('data','all_product', 'registrationData','blog'));
    }

    public function men_type_shoes($type)
    {
        $data = products::where('Gender','Male')->where('Pro_type',$type)->get();
        Return view('normal/men_type_shoes',compact('data'));
    }
    public function women_type_shoes($type)
    {
        $data = products::where('Gender','Female')->where('Pro_type',$type)->get();
        Return view('normal/women_type_shoes',compact('data'));
    }
    public function kids_type_shoes($type)
    {
        $data = products::where('Gender','Kids')->where('Pro_type',$type)->get();
        Return view('normal/kids_type_shoes',compact('data'));
    }

    public function login_user(Request $req)
    {
        $req->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email field cannot be empy',
            'password.required'=>'Password field cannot be empy',
        ]);
        $count = registration::where('Email',$req->email)->where('Password',$req->password)->count();
        $count2 = admin::where('Email',$req->email)->where('Password',$req->password)->count();
        if ($count == 1) {
            $result = registration::where('Email', $req->email)->first();
            if ($result->Status == 'Inactive') {
                session()->flash('activation_error', 'Your account is not activated');
                return redirect('login');
            } else if ($result->status == 'Deleted') {
                session()->flash('deleted_error', 'Your account is Deleted kindly contact admin');
                return redirect('Reactivate_deleted_acount');
            } else {
                session()->put('email', $result->Email);
                session()->put('password', $result->Password);
                return $this->fetch_index2();
            }
        } 
        else if ($count2 == 1) {
            $result2 = admin::where('Email', $req->email)->first();
            session()->put('email', $result2->email);
            session()->put('password', $result2->password);
            return  redirect('admin/admin_dashboard');
        }
        else {    
            session()->flash('login_error', 'Invalid email or password');
            return redirect('login');
        }
    }

    public function logout_user()
    {
        session()->forget('email');
        session()->forget('password');
        return redirect('login');
    }

    public function registration(Request $req)
    {
        $req->validate([
            'first_name'=>'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'last_name'=>'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'email'=>'required|email',
            'password'=>'required|regex:/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$)/u',
            'profile_picture'=>'mimes:jpg,png'
        ],[
            'first_name.required'=>'Firstname field cannot be empy',
            'first_name.min'=>'Firstname contain at least 2 character',
            'first_name.regex'=>'Enter valid name',

            'last_name.required'=>'Lastname field cannot be empy',
            'last_name.min'=>'Lastname contain at least 2 character',
            'last_name.regex'=>'Enter valid name',

            'email.required'=>'Email field cannot be empy',

            'password.required'=>'Password field cannot be empy',
            'password.regex'=>'Password contain minimum eight characters,one uppercase letter, one lowercase letter, one number and one special character',

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
        $reg_ins->Address="";
        $reg_ins->City="";
        $reg_ins->Pin_code="";
        $reg_ins->Bank_name="";
        $reg_ins->Account_no="";
        $reg_ins->Ifsc_code="";
        $reg_ins->Account_no="";
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
                $message->from('thebrandinfo@gmial.com','The Brand');
            });
        }
        else{
            session()->flash('error',"Registration Failed");
        }
        Return view('normal/registration');
    }

    public function activate_account(Request $req)
    {
        
$token = $req->get('token'); // Retrieve the token from the query parameters

    // Find the user by the activation token and activate their account
    $user = registration::where('activation_token', $token)->first();

    if ($user) {
        $user->Status = "Active"; // Set the account as activated
        $user->save();
        session()->flash('active_success','Your account is Active successfully Please Login');
        return redirect('login');
        // Redirect to a success page or display a success message
    } else {
        // Handle token not found (e.g., show an error message)
    }
    }

    public function men_shoes()
    {
        $data = products::where('Gender','Male')->get();
        Return view('normal/men',compact('data'));
    }
    public function men_shoes2()
    {
        $data = products::where('Gender','Male')->get();
        $registrationData = registration::where('Email',session('email'))->first();
        Return view('user/user_men',compact('data','registrationData'));
    }
    
    public function women_shoes()
    {
        $data = products::where('Gender','Female')->get();
        Return view('normal/women',compact('data'));
        Return view('user/women',compact('data'));
    }
    public function women_shoes2()
    {
        $data = products::where('Gender','Female')->get();
        $registrationData = registration::where('Email',session('email'))->first();
        Return view('user/user_women',compact('data','registrationData'));
    }

    public function kids_shoes()
    {
        $data = products::where('Gender','Kids')->get();
        Return view('normal/kids',compact('data'));
        Return view('user/kids',compact('data'));
    }
    public function kids_shoes2()
    {
        $data = products::where('Gender','Kids')->get();
        $registrationData = registration::where('Email',session('email'))->first();
        Return view('user/user_kids',compact('data','registrationData'));
    }

    public function user_men_type_shoes($type)
    {
        $registrationData = registration::where('Email',session('email'))->first();
        $data = products::where('Gender','Male')->where('Pro_type',$type)->get();
        Return view('user/user_men_type_shoes',compact('data','registrationData'));
    }
    public function user_women_type_shoes($type)
    {
        $registrationData = registration::where('Email',session('email'))->first();
        $data = products::where('Gender','Female')->where('Pro_type',$type)->get();
        Return view('user/user_women_type_shoes',compact('data','registrationData'));
    }
    public function user_kids_type_shoes($type)
    {
        $registrationData = registration::where('Email',session('email'))->first();
        $data = products::where('Gender','Kids')->where('Pro_type',$type)->get();
        Return view('user/user_kids_type_shoes',compact('data','registrationData'));
    }

    public function fetch_edit_profile() 
    {
        $data = registration::where('Email',session('email'))->first();
        $registrationData = registration::where('Email',session('email'))->first();
        return view('user/user_edit_profile',compact('data','registrationData'));
    }

    public function fetch_change_password()
    {
        $registrationData = registration::where('Email',session('email'))->first();
        return view('user/user_change_password',compact('registrationData'));
    }

    public function update_data(Request $req)
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

        Return $this->fetch_edit_profile();
    }

    public function change_password(Request $req)
    {
        $req->validate([
            'current_password'=>'required',
            'new_password'=>'required|regex:/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$)/u|confirmed',
            'new_password_confirmation' => 'required'
        ],[
            'current_password.required'=>'Current password field cannot be empy',
            'new_password.required'=>'Password field cannot be empy',
            'new_password.regex'=>'Password contain minimum eight characters,one uppercase letter, one lowercase letter, one number and one special character',
            'new_password.confirmed'=>'Password and confirm password must be same',

            'new_password_confirmation.required'=>'Confirm password field cannot be empty',            
        ]);

        $count = registration::where('Email',session('email'))->where('Password',$req->current_password)->count();
        if($count==0)
        {
            return redirect()->back()
    ->withInput()
    ->withErrors(['error' => 'The current password is incorrect. Please try again.']);
            // session()->flash('wrong_curr_pass',"Current Password is wrong");
            // return redirect('user/change_password');
        }
        else
        {
            if(registration::where('Email',session('email'))->update(array('Password'=>$req->new_password)))
            {
                session()->flash('change_success',"Password change successfully");
                return redirect('user_change_password');
            }
            else
            {
                session()->flash('change_error',"Password change successfully");
                return redirect('user_change_password');
            }
        }
    }
    
    public function view_product($id)
    {
        $data = products::where('Pro_id',$id)->first();
        $registrationData = registration::where('Email',session('email'))->first();
        Return view('normal/view_product',compact('data','registrationData'));
    }
    public function add_to_cart()
    {
        if(session('email') && session('password')){

        }
        else{
            return redirect('login');
        }
    }
    public function buy_now()
    {
        if(session('email') && session('password')){

        }
        else{
            return redirect('login');
        }
    }

    public function user_view_product($id)
    {
        $data = products::where('Pro_id',$id)->first();
        $registrationData = registration::where('Email',session('email'))->first();
        Return view('user/user_view_product',compact('data','registrationData'));
    }
    public function cart_set_size6($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->update(array('Size'=>'6'));
        return $this->user_view_product($id);
    }
    public function cart_set_size7($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->update(array('Size'=>'7'));
        return $this->user_view_product($id);
    }
    public function cart_set_size8($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->update(array('Size'=>'8'));
        return $this->user_view_product($id);
    }
    public function cart_set_size9($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->update(array('Size'=>'9'));
        return $this->user_view_product($id);
    }
    public function cart_set_size10($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->update(array('Size'=>'10'));
        return $this->user_view_product($id);
    }

    public function user_add_to_cart($id)
    {
        $data = products::where('Pro_id',$id)->first();
        // Return view('add_to_cart',compact('data'));
        $exists = add_to_cart::where('Pro_id',$id)->get();
        if($exists->count()>0){
            session()->flash('product_exists','This product is already in your cart');
            return $this->user_view_product($id);
        }
        else{
            $pro_ins = new add_to_cart();
            $pro_ins->Email = session('email');
            $pro_ins->Pro_id = $data['Pro_id'];
            $pro_ins->Pro_img = $data['Pro_img'];
            $pro_ins->Pro_name = $data['Pro_name'];
            $pro_ins->Quantity = '1';
            $pro_ins->Size = '6';
            if($pro_ins->save()){
                session()->flash('success','Product added to your cart');
                return $this->user_view_product($id);
            }
            else{
                session()->flash('error','Error in add product in your cart');
                return $this->user_view_product($id);
            }
        }
    }
    public function user_set_size6($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->where('Email',session('email'))->update(array('Size'=>'6'));
        return $this->user_view_product($id);
    }
    public function user_set_size7($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->where('Email',session('email'))->update(array('Size'=>'7'));
        return $this->user_view_product($id);
    }
    public function user_set_size8($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->where('Email',session('email'))->update(array('Size'=>'8'));
        return $this->user_view_product($id);
    }
    public function user_set_size9($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->where('Email',session('email'))->update(array('Size'=>'9'));
        return $this->user_view_product($id);
    }
    public function user_set_size10($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->where('Email',session('email'))->update(array('Size'=>'10'));
        return $this->user_view_product($id);
    }

    public function user_my_cart()
    {
        $data = DB::table('products')
        ->join('add_to_cart','products.Pro_id','=','add_to_cart.Pro_id')
        ->get();
        $registrationData = registration::where('Email',session('email'))->first();
        return view('user/user_my_cart',compact('data','registrationData'));
    }

    public function decrement_quantity($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->first();
        if($data->Quantity!=1){
            $b = add_to_cart::where('Pro_id',$id)->update(array('Quantity'=>$data->Quantity-1));
        }
        return $this->user_my_cart();
    }
    public function increment_quantity($id)
    {
        $data = add_to_cart::where('Pro_id',$id)->first();
        if($data->Quantity!=1){
            $b = add_to_cart::where('Pro_id',$id)->update(array('Quantity'=>$data->Quantity+1));
        }        
        return $this->user_my_cart();
    }

    public function user_buy_now($id)
    {
        $pro_detail = products::where('Pro_id',$id)->first();
        $registrationData = registration::where('Email',session('email'))->first();
        $cart = add_to_cart::where('Pro_id',$id)->first();

        return view('user/user_buy_now',compact('pro_detail','registrationData','cart'));
        // $p = products::where('Pro_id',$id)->get();
        // $a = add_to_cart::where('Pro_id',$id)->get();
        // $buynow = new orders();
        // $buynow->Pro_id = $p->Pro_id;
        // $buynow->Pro_img = $p->Pro_img;
        // $buynow->Payment_method = 'Cash on Delivery';
        // $buynow->Order_date = now()->format('Y-m-d');
        // $buynow->Delivery_date = now()->addDays(5)->format('Y-m-d');
        // $buynow->Email = session('email');
        // $buynow->Quantity = $a->Quantity;
        // $buynow->Size = $a->Size;

        // if($buynow->save()){
        //     $cart = add_to_cart::find($a->Pro_id);
        //     $cart->delete();
        //     session()->flash('order_success','We received Your Order, we will connect with you soon');
        //     return $this->user_my_cart();
        // }
    }

    public function user_remove_from_cart($id)
    {
        $count = add_to_cart::select()->get();
        if($count->count()>0){
        if(add_to_cart::where('Pro_id',$id)->delete())
        {
            session()->flash('remove_success','Product is successfully removed from your cart');
            return $this->user_my_cart();
        }
        else{
            session()->flash('remove_error','Error in removing product from cart');
            return $this->user_my_cart();
        }
        }
    }

    public function user_place_order(Request $req,$id)
    {
        $p = products::where('Pro_id',$id)->first();
        $data = new orders();
        $data->Pro_id = $p->Pro_id;
        $data->Pro_img = $p->Pro_img;
        $data->Payment_method = $req->payment;
        $data->Order_date = now();
        $data->Delivery_date = Carbon::now()->addDays(5);;
        $data->Order_status = "Not delivered";
        $data->Email = session('email');
        $data->Quantity = $req->quantity;
        $data->Size = $req->size;
        $data->Return_reason = "NO";

        $data->save();
        return redirect('user_my_order');
    }

    public function user_my_order()
    {
        $data = DB::table('products')
        ->join('orders','products.Pro_id','=','orders.Pro_id')
        ->get();
        $registrationData = registration::where('Email',session('email'))->first();
        return view('user/user_my_order',compact('data','registrationData'));
    }

    public function user_add_to_wishlist($id)
    {
        $w = wishlist::where('Pro_id',$id)->count();
        if($w==0)
        {
        $p = products::where('Pro_id',$id)->first();
        $a_t_w = new wishlist();
        $a_t_w->Pro_id = $p->Pro_id;
        $a_t_w->Pro_name = $p->Pro_name;
        $a_t_w->Pro_price = $p->Pro_price;
        $a_t_w->Pro_img = $p->Pro_img;
        $a_t_w->Email = session('email');
        $a_t_w->save();
        return $this->user_wishlist();
        }
        else{
            session()->flash('already_in_wishlist','Product is already in your wishlist');
            return $this->user_wishlist();
        }
    }

    public function user_remove_to_wishlist($id)
    {
        if(wishlist::where('Pro_id',$id)->delete())
        {
            return $this->user_wishlist();
        }
    }

    public function user_wishlist()
    {
        $data = wishlist::where('Email',session('email'))->get();
        $registrationData = registration::where('Email',session('email'))->first();
        return view('user/user_wishlist',compact('data','registrationData'));
    }

    public function forget_password_form_submit(Request $req)
    {
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $rules = ['em' => 'required|email'];
        $errors = [
            'em.required' => 'Email addrss is a required field',
            'em.email' => 'Enter a valid email address'
        ];
        $req->validate($rules, $errors);
        $em = $req->em;
        $data = registration::where('Email', $em)->first();
        if ($data) {
            $data1 = DeleteToken::where('email', $em)->first();
            if ($data1) {
                session()->flash('warning', 'A Password reset link is already sent to your mail please check. New link will be generated after old link expires');
            } else {
                date_default_timezone_set("Asia/Kolkata");
                $s_time = date("Y-m-d G:i:s");

                $token = hash('sha512', $s_time);
                $otp = mt_rand(100000, 999999);
                $data2 = array('name' => $data->First_name, 'email' => $em, 'token' => $token, 'otp' => $otp);
                try {
                    Mail::send(['text' => 'normal/mail_forget_pwd'], ["data3" => $data2], function ($message) use ($data2) {
                        $message->to($data2['email'], $data2['name'])->subject('Account Activation Link');
                        $message->from('thebrandinfo@gmial.com','The Brand');
                    });
                } catch (Exception $ex) {
                    session()->flash('error', 'We encountered some error in sending the password reset token');
                    return redirect('forget_password_form');
                }
                $expiry_time = Carbon::now()->addMinutes(30);
                $token_ins = new DeleteToken();
                $token_ins->email = $em;
                $token_ins->otp = $otp;
                $token_ins->token = $token;
                $token_ins->expiry_time = $expiry_time;
                if ($token_ins->save()) {
                    session()->flash('success', 'Password reset tokens sent to your registered email address');
                }
            }
        } else {
            session()->flash('error', 'Sorry the email address you entered is not registered.');
        }
        return redirect('forget_password_form');
    }

    public function verify_forget_pwd_otp($email, $token)
    {
        date_default_timezone_set("Asia/Kolkata");
        session()->put('forget_pwd_email', $email);
        session()->put('forget_pwd_token', $token);
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data1 = DeleteToken::where('email', $email)->first();
        if ($data1) {
            return view('normal/verify_otp_forget_pwd');
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function verify_otp_forget_password_action(Request $req)
    {

        $req->validate(['otp' => 'required|size:6'], ['otp.required' => 'OTP cannot be empty', 'otp.size' => 'OTP must have 6 digits only']);
        $otp = $req->otp;
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            if ($data->otp == $otp) {
                return view('normal/reset_pwd');
            } else {
                session()->flash('error', 'Incorrect OTP');
                return view('normal/verify_otp_forget_pwd');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function reset_pwd_action(Request $req)
    {
        $rules = [
            'npwd' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/|confirmed',
            'npwd_confirmation' => 'required',
        ];
        $errors = [
            'npwd.required' => 'Password field cannot be empty',
            'npwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'npwd.confirmed' => 'Password and Confirm Password must match',
            'npwd_confirmation.required' => 'Confirm Password must not be empty'
        ];
        $req->validate($rules, $errors);
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            $data1 = registration::where('email', $email)->update(array('password' => $req->npwd));
            if ($data1) {
                DeleteToken::where('email', $email)->delete();
                session()->flash('succ', 'Password changed successfully');
                return redirect('login');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }
}
