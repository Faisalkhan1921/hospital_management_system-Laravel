<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //REDIRECT FUNCTION
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
              return view('admin.home');
            }
            else
            {
                $data = doctor::all();
                return view('user.home',compact('data'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    //RETURN CLASS HOME
    public function index()
    {
        IF(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $data = doctor::all();
            return view('user.home', compact('data'));
        }
    }

    public function appointment(Request $request)
    {
        $appointment = new Appointment;

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->doctor = $request->doctor;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->status = 'In Progress';

        if(Auth::id())
        {
        $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        return redirect()->back()->with('appointment_message','Appointment made Successfully');

    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $user_id = Auth::user()->id;
            $appoint = Appointment::where('user_id',$user_id)->get();
            return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        $cancel_appoint = Appointment::find($id);
        $cancel_appoint->delete();

        return redirect()->back()->with('cancel_appoint','Appointment cancel Successfully');
    }
}
