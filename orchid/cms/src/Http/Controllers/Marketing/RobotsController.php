<?php

namespace Orchid\CMS\Http\Controllers\Marketing;

use Illuminate\Http\Request;
use Orchid\Platform\Http\Controllers\Controller;

class RobotsController extends Controller
{

    /**
     * @var
     */
    public $path;

    /**
     * RobotsController constructor.
     */
    public function __construct()
    {
        $this->checkPermission('dashboard.marketing.robots');
        $this->path = public_path('robots.txt');
    }

    /**
     * @return string
     */
    public function index()
    {
        $content = file_exists($this->path) ? file_get_contents($this->path) : '';

        return view('cms::container.marketing.robots.index', [
            'content' => $content,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $file = fopen($this->path, "w");

        fwrite($file, $request->get('content', ''));
        fclose($file);

        return redirect()->back();
    }
}
