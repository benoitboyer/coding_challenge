<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Rules\Ukphone;

use Validator;
use Session;

class ContactController extends Controller
{
    public function getContact(){
    	// Just return the form view
    	return view("contact.contact");
    }

    public function postContact(Request $request)
    {
    	// Validate the post datas

    	// Format the date_of_birth string with all the parts from the form
    	// and put it in the request object in oder to be validated propely

    	$day = $request->day;
    	$month = $request->month;
    	$year = $request->year;

    	$date_of_birth=$day.'/'.$month.'/'.$year;
    	$request->date_of_birth=$date_of_birth;

    	// Even if laravel provide xss protection in the view using {{$value}} it's always good to keep the database clean from script code in case of database is used by an other framework later.
    	$request->comment = htmlentities($request->comment);

    	// I decided to Create a new rule for the ukphone number because it will be easier to change it later and use anywhere.
    	$this->validate($request, [
        	'first_name' => 'required|min:2|max:50',
        	'last_name' => 'required|min:2|max:50',
        	'phone_number' => ['required', new Ukphone],
        	'gender'=>'required',
        	'email' => 'required|email|max:70',
        	'date_of_birth' => 'date_format:"dd/mm/yyyy"',
        	'comment' => 'max:5000'
        ]);

    	//Store the datas in the database
    	$contact= new Contact;

    	$contact->first_name = $request->first_name;
    	$contact->last_name = $request->last_name;
    	$contact->phone_number = $request->phone_number;
    	$contact->gender = $request->gender;
    	$contact->email = $request->email;
    	$contact->comment = $request->comment;

    	// We need to rebuild the date based on the post request day, month and year. Then validate the date before saving it in the database on the basic format Y-m-d
    	$contact->date_of_birth = date('Y-m-d',strtotime(str_replace('/', '-',$request->date_of_birth)));

      	$contact->save();

    	//return a success message to the page. 
    	Session::flash('success', 'Datas successfully added, thank you for your time.');
    	
    	return view('contact/contact');
    }
}
