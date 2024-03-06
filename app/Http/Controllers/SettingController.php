<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Setting;
use App\Enums\ThemeName;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function editSettings()
    {
        $user = User::find(auth()->id());
        $themeNames = ThemeName::getValues();
        return view('settings.index', [
            'settings' => $user->setting,
            'themeNames' => $themeNames
        ]);
    }
       
        public function store(Request $request)
        {
            $request->validate([
                'theme_name' => 'required|string|in:light,dark,pinky',
            ]);

            auth()->user()->setting()->updateOrCreate(
                ['user_id' => auth()->id()],
                ['theme_name' => $request->theme_name]
            );

            return back()->with('success', 'Settings updated successfully');
        }
        public function update(Request $request)
        {
            $request->validate([
                'theme_name' => 'required|string|in:light,dark,pinky',
            ]);

            auth()->user()->setting()->update([
                'theme_name' => $request->theme_name
            ]);

            return back()->with('success', 'Settings updated successfully');
        }
        public function destroy()
        {
            auth()->user()->setting()->delete();

            return back()->with('success', 'Settings deleted successfully');
        }
    

}
