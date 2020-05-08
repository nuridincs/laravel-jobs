@extends('layouts.app')

<div class="container m-auto w-50">
  <h1>Login page</h1>
  @if(\Session::has('alert'))
    <div class="alert alert-danger">
      <div>{{Session::get('alert')}}</div>
    </div>
  @endif
  @if(\Session::has('alert-success'))
    <div class="alert alert-success">
      <div>{{Session::get('alert-success')}}</div>
    </div>
  @endif
  <form action="/do-login">
    <div class="form-group">
      <div>
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" required>
      </div>
      <div>
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mt-3">
        <input type="submit" name="submit" value="Login" class="btn btn-success btn-block">
      </div>
    </div>
  </form>
</div>