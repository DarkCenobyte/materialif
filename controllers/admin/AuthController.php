<?php

namespace Controllers\Admin;

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
    $user = User::where('ranks_id', Rank::ADMIN)
      ->where('username', $username)
      ->first();

    if ($user && password_verify($user->password, $hash)) {
      if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
      }
      $this->login($user->id, $user->username);
    }
  }

  private function login($id, $username)
  {
    $_SESSION['userid'] = $id;
    $_SESSION['username'] = $username;
  }

}
