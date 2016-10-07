<?php

namespace Controllers\Admin;
use Models\User;
use Models\Rank;

/**
 * Admin Authentication page
 */
class AuthController extends BaseController
{
  public function index()
  {
    $this->renderer->render("index");
  }

  public function auth($username, $password)
  {
    $user = User::where('rank_id', Rank::ADMIN)
      ->where('username', $username)
      ->first();

    if ($user && password_verify($password, $user->password)) {
      if (password_needs_rehash($user->password, PASSWORD_DEFAULT)) {
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
      }
      $this->login($user->id, $user->username);
    } else {
      echo "incorrect data";
    }
  }

  private function login($id, $username)
  {
    echo "connected";
    $_SESSION['userid'] = $id;
    $_SESSION['username'] = $username;
    $this->redirect->to("index");
    return;
  }

}
