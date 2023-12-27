<?php

namespace App\Livewire\Forms;

use App\Models\CampussProfile;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CampussProfileForm extends Form
{
    use WithFileUploads;

    #[Validate('string|required')]
    public string|null $app_code;
    #[Validate('string|required')]
    public string|null $app_title;
    #[Validate('string|required')]
    public string|null $app_name;
    #[Validate('string|required')]
    public string|null $no_sk;
    #[Validate('string|required')]
    public string|null $address;
    #[Validate('string|required')]
    public string|null $phone;
    #[Validate('string|required')]
    public string|null $city;
    #[Validate('string|required')]
    public string|null $mail;
    #[Validate('string|required')]
    public string|null $app_url;
    #[Validate('string|required')]
    public string|null $rector_nidn;
    #[Validate('string|required')]
    public string|null $rector_name;
    #[Validate('nullable|file|mimes:png')]
    public $logo;
    #[Validate('nullable|file|mimes:ico')]
    public $favicon;
    #[Validate('nullable|file|mimes:png,jpg')]
    public $login_background;

    public function save()
    {
        $profile = CampussProfile::findOrFail(['id' => 1])->first();
        if ($profile) {
            $profileSaved = $profile->update([
                'app_name' => $this->app_name,
                'app_code' => $this->app_code,
                'app_title' => $this->app_title,
                'app_url' => $this->app_url,
                'no_sk' => $this->no_sk,
                'address' => $this->address,
                'phone' => $this->phone,
                'city' => $this->city,
                'mail' => $this->mail,
                'rector_nidn' => $this->rector_nidn,
                'rector_name' => $this->rector_name,
            ]);
        } else {
            $profileSaved = CampussProfile::create([
                'app_name' => $this->app_name,
                'app_code' => $this->app_code,
                'app_title' => $this->app_title,
                'app_url' => $this->app_url,
                'no_sk' => $this->no_sk,
                'address' => $this->address,
                'phone' => $this->phone,
                'city' => $this->city,
                'mail' => $this->mail,
                'rector_nidn' => $this->rector_nidn,
                'rector_name' => $this->rector_name,
            ]);
            $profile = CampussProfile::findOrFail(['id' => 1])->first();
        }
        $logo = $this->logo;
        $favicon = $this->favicon;
        $loginBackground = $this->login_background;
        // save file on storage and save hashed name
        if ($logo) {
            if ($profile->logo) {
                Storage::delete('public/asset/', $profile->logo);
            }
            $logo->storeAs('public/asset/', $logo->hashName());
            $profileSaved = $profile->update(['logo' => $logo->hashName()]);
        }
        if ($favicon) {
            if ($profile->favicon) {
                Storage::delete('public/asset/', $profile->favicon);
            }
            $favicon->storeAs('public/asset/', $favicon->hashName());
            $profileSaved = $profile->update(['favicon' => $favicon->hashName()]);
        }
        if ($loginBackground) {
            if ($profile->background_login) {
                Storage::delete('public/asset/', $profile->login_background);
            }
            $loginBackground->storeAs('public/asset/', $loginBackground->hashName());
            $profileSaved = $profile->update(['login_background' => $loginBackground->hashName()]);
        }
    }

    public function mountData()
    {
        $profile = CampussProfile::find(1);
        if ($profile) {
            $this->app_code = $profile->app_code;
            $this->app_title = $profile->app_title;
            $this->app_name = $profile->app_name;
            $this->no_sk = $profile->no_sk;
            $this->address = $profile->address;
            $this->phone = $profile->phone;
            $this->city = $profile->city;
            $this->mail = $profile->mail;
            $this->app_url = $profile->app_url;
            $this->logo = $profile->logo;
            $this->favicon = $profile->favicon;
            $this->login_background = $profile->background_login;
            $this->rector_nidn = $profile->rector_nidn;
            $this->rector_name = $profile->rector_name;
        } else
        {
            CampussProfile::create([]);
        }
    }
}
