<?php

namespace App\Http\Controllers;

use App\Models\controll_panel;
use App\Models\notifications;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = controll_panel::find(Auth::id());

        // return redirect()->back()
        // ->with('key', $data);
        $user_data=User::find(Auth::id());
        // $notif = notifications::where('user_id', Auth::id())
        //             ->orderBy('created_at', 'desc')
        //             ->get();

        if($user_data->first_star){
            return view('fram.index' ,['key'=>$data ,] );
        }
        else{
             $user_data->first_star=1;
             $user_data->save();
            return view('fram.Hello_user');
        }

    }
//     public function index()
// {
//     $data = controll_panel::find(Auth::id());

//     if (User::find(Auth::id())->is_twoilo) {
//         return view('fram.index', ['key' => $data]);
//     } else {
//         
//         return view('fram.index', ['message' => 'You do not have access to this page.']);
//     }
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * code useing to create onlay
     */
    public function store(Request $request)
    {

        // $data = new controll_panel();
        // if ($request->name == 'true')
        //     $data->button_state = true;
        // else
        //     $data->button_state = true;
        // $data->name = 'f';

        // $data->save();
        // return redirect()->route('main')->with('key', $data->button_state);
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(controll_panel $controll_panel)
    {
        //
    }

    /**
     * code using excaning satae
     */
    public function edit($id)
    {
        $data = controll_panel::where('id',$id)->first();

        if ($data->button_state == 1){

            $data->button_state = 0;
             session()->flash('messages', 'تم ايقاف الجهاز');
        }
        else{

             session()->flash('messages', 'تم تشغيل الجهاز');
            $data->button_state = 1;
        }
            $data->save();

        return redirect()->route('data.index',['key'=>$data])->with("massge");

    }


    public function update(Request $request, controll_panel $controll_panel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(controll_panel $controll_panel)
    {
        //
    }
}
