<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use App\Http\Requests;

class AdminSettingController extends Controller
{

    protected $request;
    protected $setting;
    public function __construct(Request $request, Setting $setting)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->setting = $setting;
    }

    public function index()
    {
        $recipient = $this->setting->where('key', 'email')->first();
        $recipient = json_decode($recipient->json)->data;
        return view('auth.setting.setting', [
            'recipient' => $recipient,
        ]);
    }

    public function update()
    {
        $recipient       = $this->setting->where('key', 'email')->first();
        $recipient->json = json_encode(array('data' => $this->request->input('recipient', '')));
        $recipient->save();
        return redirect('/admin/settings');
    }
}
