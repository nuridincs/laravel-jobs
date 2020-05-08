@extends('layouts.app')

<div class="container">
  <a href="/">Back</a>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-8">
          <small>{{ $detailJobs['company'] }}/{{ $detailJobs['location'] }}</small>
          <h3>{{ $detailJobs['title'] }}</h3>
          <div class="bottom-line"></div>
          <div class="m-2">
            {!! $detailJobs['description'] !!}
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <div>{{ $detailJobs['company'] }}</div>
              <div class="bottom-line"></div>
              <img src="{{ $detailJobs['company_logo'] }}" alt="" class="fit-img">
              <a href="{{ $detailJobs['company_url'] }}">{{ $detailJobs['company_url'] }}</a>
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-body">
              <div>How to apply</div>
              <div class="bottom-line mb-3"></div>
              <div>{!! $detailJobs['how_to_apply'] !!}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>