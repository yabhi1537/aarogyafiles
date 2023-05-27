<?php
namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Language;


class AboutSettingController extends Controller
{

    public function edit(Request $request)
    {

        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['setting'] = AboutSetting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['setting'] = AboutSetting::findOrFail($lang->id);
        }

        return view('settings.about.about-edit', $data, compact('langs'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, AboutSetting $setting, $langid)
    {
        $setting = AboutSetting::where('language_id', $langid)->firstOrFail();
        
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }
        
        if ($file = $request->file('story_image')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['story_image'] = $photo->id;
        }
        
        if ($file = $request->file('about_image')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['about_image'] = $photo->id;
        }


        $setting->update($input);

        return back()->with('setting_success','Settings updated successfully!');
    }



}

