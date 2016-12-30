<?php

namespace Controllers;

/**
 *
 */
use Models\Thread;
use Models\Post;

class ThreadController extends BaseController
{
  public function index()
  {
    // 404
  }

  public function view($threadId)
  {
    $thread = Thread::find($threadId);
    if (isset($thread)) {
      $posts = $thread->posts->take(25)->get();
      //TODO: count $posts (for page later) and do the view rendering
    } else {
      $this->index();
      exit;
    }
  }
}
