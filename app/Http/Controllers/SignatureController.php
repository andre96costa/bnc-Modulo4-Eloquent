<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SignatureController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),['drink' => 'required|string']);
        $params = $validator->fails() ? $validator->messages() : $validator->validate()['drink'];
        $user = Auth::user();
        $name = $user->name;
        $document = Client::where('user_id', $user->id)->first()->document;
        $status = $user->client->signatures->first()->status->name;

        return view('teste', compact('name', 'document', 'status', 'params'));
    }

    // $plan = Plan::create([
    //     'name' => 'Last Plan',
    //     'short_description' => 'A terrible plan',
    //     'price' => 2990
    // ]);

    // $client = Auth::user()->client()->create([
    //     'document' => '02907039130',
    //     'birthdate' => '1992-07-20',
    // ]);

    // $client->signatures()->create([
    //     'plan_id' => $plan->id,
    //     'status' => SignatureStatus::ACTIVE
    // ]);
}
