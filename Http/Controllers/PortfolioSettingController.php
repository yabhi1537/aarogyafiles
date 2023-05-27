<?php
namespace App\Http\Controllers;

use App\Models\PortfolioSetting;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Language;

class PortfolioSettingController extends Controller
{
    //

    public function edit(Request $request)
    {

        $langs = Language::all();
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['setting'] = PortfolioSetting::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['setting'] = PortfolioSetting::findOrFail($lang->id);
        }
        return view('settings.portfolio.portfolio-edit', $data, compact('langs'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioSetting $setting, $langid)
    {
        $setting = PortfolioSetting::where('language_id', $langid)->firstOrFail();
        
        $input = $request->all();

        $setting->update($input);

        return back()->with('setting_success','Settings updated successfully!');
    }

    public function delete_page(Request $request, Page $page) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $pages = Page::findOrFail($request->checkbox_array);
            foreach ($pages as $page) {
                $page->delete();
            }
            return back()->with('pages_success','Page/s deleted successfully!');
        } else {
            return back();
        }

        $pages = Page::findOrFail($request->checkbox_array);
        foreach ($pages as $page) {
            $page->delete();
        }

        return back();
        //return 'works';
    }




}
