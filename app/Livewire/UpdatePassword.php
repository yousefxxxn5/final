<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $name;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;
    public $canChange = false;
    public $successMessage;

    public function mount()
    {
        // تعبئة الاسم الحالي تلقائيًا
        $this->name = Auth::user()->name;
    }
    public function checkCurrentPassword()
    {
        $this->resetErrorBag();

        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();

        if (Hash::check($this->currentPassword, $user->password)) {
            $this->canChange = true;
        } else {
            $this->canChange = false;
            $this->addError('currentPassword', 'كلمة المرور غير صحيحة');
        }
    }
    public function updateName()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:50',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->save();

        session()->flash('message', 'تم تغيير الاسم بنجاح!');
        $this->dispatch('nameupdated');
    }

    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|same:confirmPassword',
            'confirmPassword' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'كلمة المرور الحالية غير صحيحة.');
            $this->canChange = false;
            return;
        }
        $user->password = Hash::make($this->newPassword);
        $user->save();
        $this->reset(['currentPassword', 'newPassword', 'confirmPassword', 'canChange']);
        $this->successMessage = 'تم تغيير كلمة المرور بنجاح.';
    }

    public function render()
    {
        return view('livewire.update-password');
    }
}
