<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteForm extends Component
{
  public string $destroyRoute;
  public string $deleteMessage;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(string $destroyRoute, string $deleteMessage = 'Delete')
  {
    $this->destroyRoute = $destroyRoute;
    $this->deleteMessage = $deleteMessage;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
      return view('components.delete-form');
  }
}
