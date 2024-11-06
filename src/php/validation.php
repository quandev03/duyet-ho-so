<?php
function validatePassword($password):bool {
    if (empty($password)) {
      return false;
    }
    if (strlen($password) < 8) {
      return false;
    }
    if (!preg_match('/[A-Z]/', $password)) {
      return false;
    }
    if (!preg_match('/[a-z]/', $password)) {
      return false;
    }
    if (!preg_match('/[\W_]/', $password)) {
      return false;
    }
    return true;
  }
  function validateUsername ($username): bool {
    if (strlen($username) < 4) {
      return false;
    }
    if (preg_match('/\s/', $username)) {
      return false;
    }
    if (preg_match('/[^\w]/', $username)) {
      return false;
    }
    return true;
  }