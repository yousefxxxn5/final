<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsForm extends Component
{
    use WithFileUploads;

    public $name;
    public $password;
    public $password_confirmation;
    public $photo;
    public function mount()
    {
        $this->name = auth()->user()->name;
    }

    public function updateSettings()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|max:2048', // 2MB كحد أقصى
        ]);

        $user = auth()->user();
        $user->name = $this->name;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        if ($this->photo) {
            $filename = $this->photo->store('profile-photos', 'public');
            $user->profile_photo_path = $filename;
        }

        // $user->save();

        session()->flash('message', 'تم تحديث الإعدادات بنجاح.');
    }
    public function render()
    {
        return view('livewire.settings-form');
    }
}
