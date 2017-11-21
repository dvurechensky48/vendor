<?php

namespace Orchid\CMS\Http\Controllers\Posts;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Alert\Facades\Alert;
use Orchid\CMS\Core\Models\Page;
use Orchid\Platform\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @var
     */
    public $locales;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->checkPermission('dashboard.posts');
        $this->locales = collect(config('cms.locales'));
    }

    /**
     * @param Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Page $page = null)
    {
        $this->checkPermission('dashboard.pages.' . $page->slug);

        return view('cms::container.posts.page', [
            'type'    => $page->getBehaviorObject($page->slug),
            'locales' => $this->locales,
            'post'    => $page,
        ]);
    }

    /**
     * @param         $page
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Page $page, Request $request)
    {
        $this->checkPermission('dashboard.pages.' . $page->slug);
        $type = $page->getBehaviorObject($page->slug);

        $page->fill($request->all());

        $page->fill([
            'user_id'    => Auth::user()->id,
            'type'       => 'page',
            'slug'       => $page->slug,
            'status'     => 'publish',
            'options'    => $page->getOptions(),
            'publish_at' => Carbon::now(),
        ]);

        $page->save();

        foreach ($type->getModules() as $module) {
            $module = new $module();
            $module->save($type, $page);
        }

        Alert::success(trans('cms::common.alert.success'));

        return back();
    }
}
