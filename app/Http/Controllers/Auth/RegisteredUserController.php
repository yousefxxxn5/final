<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\controll_panel;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');

    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        $data =new controll_panel();
        $data->user_id=auth::id();
        $data->name=auth::getName();
        $data->IR_senser=1;
        $data->SWITCH_senser=1;
        $data->button_state=1;
        $data->CAMRA_senser=1;
        $data->test=1;

        $data->n1_sms="0";
        $data->n2_sms="0";
        $data->n3_sms="0";

        $data->n1_whatapp="0";
        $data->n2_whatapp="0";
        $data->n3_whatapp="0";

        $data->n1_email="0";
        $data->n2_email="0";
        $data->n3_email="0";

        $data->alart_sound=1;
        $data->saaaq_electrical=1;
        $data->send_sms=1;
        $data->send_whatapp=1;
        $data->send_emil=1;
        $data->send_pumm=1;
        $data->send_eleictrical=1;
        $data->send_network=1;
       $data->save();

    //    Role::create(['name' => 'admin']);
    //    Permission::create(['name' => 'manage']);
    //    $role = Role::findByName('admin');
    //    $role->givePermissionTo('manage');

    //    $user = User::find(auth::id())->assignRole('admin');


        return redirect(RouteServiceProvider::HOME);
    }
}
