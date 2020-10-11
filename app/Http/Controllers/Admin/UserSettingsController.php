<?php

namespace App\Http\Controllers\Admin;

use App\Forms\UserSettingsForm;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserSettingsForm::class, [
            'url' => route('admin.users.settings.update'),
            'method' => 'PUT'
        ]);
        return view('admin.users.settings', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $form = \FormBuilder::create(UserSettingsForm::class);

        /** @var Form $form */
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();
        $data['password'] = bcrypt($data['password']);
        \Auth::user()->update($data);
        $request->session()->flash('message', 'Senha alterada com sucesso');

        return redirect()->route('admin.users.settings.edit');
    }
}
