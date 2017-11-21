<?php

namespace Orchid\CMS\Events\Marketing;

use Illuminate\Queue\SerializesModels;
use Orchid\CMS\Http\Forms\Marketing\Advertising\AdvertisingFormGroup;

class AdvertisingEvent
{
    use SerializesModels;

    /**
     * @var
     */
    protected $form;

    /**
     * Create a new event instance.
     * SomeEvent constructor.
     *
     * @param AdvertisingFormGroup $form
     */
    public function __construct(AdvertisingFormGroup $form)
    {
        $this->form = $form;
    }
}
