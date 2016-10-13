<?php

namespace Controllers\Admin;

/**
 * Users settings page
 */
use Models\User;
use Models\Rank;

class UserController extends BaseController
{
  public function index($page = 1)
  {
    //get list
    $users = User::skip(($page - 1) * 10)->take(10)->get();
    $pageCount = ceil(User::count() / 10);
    $ranksList = Rank::all();

    $this->renderer->render("index", [
      "usersList"   => $users,
      "usersPCount" => $pageCount,
      "currentPage" => $page,
      "ranksList"   => $ranksList
    ]);
  }

  public function add($username, $email, $password, $rank = Rank::REGISTERED,
                      $avatar = null, $firstName = null, $lastName = null,
                      $birthdate = null)
  {
    $user = new User();
    $user->username = $username;
    $user->email = $email;
    $user->password = password_hash($password, PASSWORD_DEFAULT);
    $user->rank_id = $rank;
    $user->avatar = $avatar;
    $user->first_name = $firstName;
    $user->last_name = $lastName;
    $user->birthdate = $birthdate;
    $user->save();

    $this->redirect->to("user");
  }

  public function edit($id, $username, $email, $password, $rank,
                       $avatar, $firstName, $lastName,
                       $birthdate)
  {
    $user = User::find($id);
    $user->username = $username;
    $user->email = $email;
    $user->password = isset($password) ? password_hash($password, PASSWORD_DEFAULT) : $user->password;
    $user->rank_id = $rank;
    $user->avatar = $avatar;
    $user->first_name = $firstName;
    $user->last_name = $lastName;
    $user->birthdate = $birthdate;
    $user->save();

    $this->redirect->to("user");
  }

  public function remove($id)
  {
    User::destroy($id);

    $this->redirect->to("user");
  }
}
