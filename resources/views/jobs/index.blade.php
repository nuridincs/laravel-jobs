@extends('layouts.app')
<div class="header py-2">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col">
        <h3>
          <span><b>Github</b></span> Jobs
        </h3>
      </div>
      <div class="col text-right">
        <span class="text-white">Hi {{ Session::get('name') }}</span>
        |
        <a href="/do-logout" class="text-white">Logout</a>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="search">
    <form action="/search-jobs">
      @php
        $description = !empty($_GET['description']) ? $_GET['description'] : '';
        $location = !empty($_GET['location']) ? $_GET['location'] : '';
        $full_time = !empty($_GET['full_time']) ? 'checked="checked"' : '';
      @endphp
      <div class="row my-4">
        <div class="col">
          <label for="">Job Description</label>
          <input type="text" class="form-control" name="description" value="{{ $description }}">
        </div>
        <div class="col">
          <label for="">Location</label>
          <input type="text" class="form-control" name="location" value="{{ $location }}">
        </div>
        <div class="col">
          <label for="">&nbsp;</label>
          <div class="row d-flex align-items-center">
            <div class="col-2">
              <input type="checkbox" class="form-control" name="full_time" {{ $full_time }}>
            </div>
            <div class="col">
              <small><b>Full Time Only</b></small>
            </div>
          </div>
        </div>
        <div class="col">
          <label for="">&nbsp;</label>
          <input type="submit" class="form-control btn btn-primary" value="Search">
        </div>
      </div>
    </form>
  </div>
  <div class="card">
    <div class="card-body">
      @if (!empty($search))
        @if (count($jobs) > 0)
          <h1>Menampilkan {{ count($jobs) }} jobs</h1>
        @else
          <h1>Not Found</h1>
        @endif
      @else
        <h1>Jobs List</h1>
      @endif
      @if (count($jobs) > 0)
        @foreach ($jobs as $data)
          <div class="row bottom-line p-2">
            <div class="col">
              <div class="title">
                <a href="/detail-jobs/{{ $data['id'] }}">
                  {{ $data['title'] }}
                </a>
              </div>
              <div>{{ $data['company'] }} - <span class="type">{{ $data['type'] }}</span></div>
            </div>
            <div class="col text-right">
              <div>{{ $data['location'] }}</div>
              <div>{{ $data['created_at'] }}</div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>