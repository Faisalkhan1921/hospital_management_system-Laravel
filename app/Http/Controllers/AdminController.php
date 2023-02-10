<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class AdminController extends Controller
{
    //add doctor view
    public function addview()
    {
        return view('admin.add_doctors');
    }

    public function upload_doctor(Request $request)
    {
        $doctor = new Doctor;

        //we are getting image from the adddoctor form
        $image = $request->image;
        //we are giving random name to the image 
        $imagename = time(). '.' . $image->getClientoriginalExtension(); 
        //moving the image in folder with imagename
        $request->image ->move('doctorimage', $imagename);

        //now we are sending doctor image to the database
        //here $doctor->image is database column name
        $doctor->image = $imagename;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->roomno = $request->roomno;
        
        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointmnet()
    {
        $showappointment = Appointment::all();
        return view('admin.showappointmnet',compact('showappointment'));
    }

    public function approve($id)
    {
        $approve = Appointment::find($id);

        $approve -> status = 'Approved';
        $approve -> save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $canceled = Appointment::find($id);

        $canceled -> status = 'canceled';
        $canceled -> save();

        return redirect()->back();
    }

    public function displaydoctors()
    {
        $displaydoctor = Doctor::all();
        return view('admin.displaydoctors',compact('displaydoctor'));
    }

    public function removedoctor($id)
    {
        $removedoctor = Doctor::find($id);
        $removedoctor->delete();

        return redirect()->back();
    }

    public function Updatedoctorview($id)
    {
        $doctorview = Doctor::find($id);
        return view('admin.Updatedoctorview',compact('doctorview'));
    }

    public function editdoctor(Request $request,$id)
    {
        $editdoctor = Doctor::find($id);
        $editdoctor->name = $request->name;
        $editdoctor->phone = $request->phone;
        $editdoctor->speciality = $request->speciality;
        $editdoctor->roomno = $request->roomno;        
        
         //we are getting image from the adddoctor form
         $image = $request->image;

         if($image)
         {    
         //we are giving random name to the image 
         $imagename = time(). '.' . $image->getClientoriginalExtension(); 
         //moving the image in folder with imagename
         $request->image ->move('doctorimage', $imagename);
 
         //now we are sending doctor image to the database
         //here $doctor->image is database column name
         $editdoctor->image = $imagename;
         }
         $editdoctor -> save();

         return redirect()->back();
    }

    public function sendmailview($id)
    {
        $data = Appointment::find($id);
        return view('admin.sendmailview',compact('data'));
    }

    public function sendemail(Request $request,$id)
    {
        $sendemail = Appointment::Find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
            ];

            // Notification::send($sendemail,new SendEmailNotification($details));
            FacadesNotification::send($sendemail,new SendEmailNotification($details));

            return redirect()->back();
    }
}




