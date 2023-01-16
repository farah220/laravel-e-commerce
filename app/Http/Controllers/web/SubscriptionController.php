<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
      $attributes = $request->validate([
        'email' => ['required','unique:subscriptions','max:255']
      ]);
      $attributes['user_id'] = auth()->id();
       Subscription::create($attributes);
        return redirect()->back()->with('success_message','Thank you for subscription!');

    }

}
