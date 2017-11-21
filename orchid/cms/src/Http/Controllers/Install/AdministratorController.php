<?php

namespace Orchid\CMS\Http\Controllers\Install;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Orchid\Platform\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    /**
     * Administrator view.
     */
    public function administrator()
    {
        return view('cms::container.install.administrator');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @internal param Redirector $redirect
     */
    public function create(Request $request)
    {
        $exitCode = Artisan::call('make:admin', [
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect()->route('install::final')
            ->with(['message' => $exitCode]);
    }
}
