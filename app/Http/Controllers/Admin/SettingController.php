<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\MediaUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public $types = [
        'text'     => 'Text',
        'textarea' => 'TextArea',
        'file'     => 'File',
    ];

    public $groups = [
        'general' => 'General',
        'theme'   => 'Theme',
        'media'   => 'Media',
    ];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.setting.index', [
            'settings' => Setting::all(),
            'groups' => $this->groups,
            'types' => $this->types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('settings.index')
                ->withErrors($validator)
                ->withInput();
        }
        $data['slug'] = Str::slug($data['title']);
        $setting = Setting::create($data);
        if($setting) {
            return back()->with('success', 'Setting successfully created!');
        }
        return back()->with('errors', 'Error: Setting not created!');
    }

    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Setting $setting, MediaUploadService $service)
    {

        if($request->hasFile('value')) {
            $setting->value = $service->uploadImage($request->file('value'));
        } else {
            $setting->value = $request->get('value');
        }

        $setting->save();
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully!');
    }
}
