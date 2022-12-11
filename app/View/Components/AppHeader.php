<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppHeader extends Component
{

  public string $pageTitle;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(string $pageTitle)
  {
    $this->pageTitle = $pageTitle;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.app-header');
  }
}
