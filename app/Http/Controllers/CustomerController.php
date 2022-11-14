<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        // $url = url('/customer');
        // $data = compact('url');
        return view('customer');
    }

    public function store(Request $request)
    {
        // Insert query

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                // 'confirm_password' => 'required|same:password'
                'gender' => 'required',
                'dob' => 'required',
                'address' => 'required'
            ]
        );
        $customer = new Customer();

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->password = Hash::make($request['password']);
        $customer->address = $request['address'];
        
        $customer->save();
        // ---------------
        // return redirect()->to('customer');
        return redirect('/customer/view');
    }

    public function login_form()
    {
        return view('login');
    }

    public function save_login(Request $request)
    {
        $rule=
            [
                'email' => 'required|email',
                'password' => 'required',    
            ];

        if (!$request->validate($rule)) 
        {
            return redirect('/check');
        }
        else
        {
            
            // $check = $customer::where('email','==',$request['email'])->get();
            $email = $request['email'];
            $password = $request['password'];

            $customer = new Customer();
            $user = $customer::where('email',$email)->first();


            if (!$user) 
            {
                return redirect()->back()->with('error','Your email does not exit');
            }
            else
            {
                if(password_verify($password,$user['password']))
                {
                    $loggedUser = $user['customer_id'];
                    // echo $loggedUser;
                    // die;
                    session(['user_id'=>$loggedUser]);
                    return redirect('customer/view')->with('success','Welcome to dashboard');
                }
                else
                {
                    return back()->with('error','Incorrect password');
                }
            }

        }
    }

    public function view(Request $request)
    {
        // Select query
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $customer = Customer::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();
        }
        else
        {
            $customer = Customer::paginate(10);
        }

            $data = compact('customer','search');
            return view('customer-view')->with($data);        

        // -----------
    }

    public function delete($id)
    {
        $customer = Customer::find($id);

        if (!is_null($customer)) {
            $customer->delete();
            return redirect()->back()->with('success', 'Customer has been deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Customer not found');
        }
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            // not found
            return redirect('customer/view');
        } else {
            $data = $customer->where('customer_id', $id)->first();
            $val = compact('data');
            
            return view('customer-update')->with($val);
        }
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = Hash::make($request['password']);
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->save();

        return redirect('customer/view')->with('success', 'Data updated successfully');
    }

    public function Block($id, Request $request)
    {
        
        $customer = Customer::find($id);
        $customer::find($request->id)->update(['Status' => 0]);

        return redirect('/customer/view');
    }

    public function Unblock($id, Request $request)
    {
        
        $customer = Customer::find($id);
        $customer::find($request->id)->update(['Status' => 1]);

        return redirect('/customer/view');
    }

    public function logout(Request $request)
    {
         if(session()->has('user_id'));
         {
            $request->session()->forget('user_id');
            return redirect('/login');
         }
    }

}
