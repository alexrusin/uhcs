<?php
namespace App\Http\Controllers;

class FormController extends Controller
{
    public function storeClient()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ], [
            'name' => 'Please enter client\'s name'
        ]); 
        
        return response(['message' => 'Your request has been submitted'], 200);
    }
}