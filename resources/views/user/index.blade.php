@extends('layouts.master')

@section('title', 'user List')
@section('extraStyle')
  <style>
    th{
      font-weight: blod !important;
      color:#000 !important;
    }
  </style>
@endsection
@section('content')
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li class="active">Users</li>
        <li><a href="{{URL::Route('user.create')}}">New user</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>User List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="10%" class="text-center">Role</th>
                        <th width="20%" class="text-center">Name</th>
                        <th width="20%" class="text-center">email</th>
                        <th width=20%" class="text-center">Entry At</th>
                        <th width="10%" class="text-center">By</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="10%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>

                        @foreach($users as $user)
                        <tr>
                          <td class="text-center">
                              @if($user->hasRole('admin')) Admin @endif
                              @if($user->hasRole('supervisor')) Supervisor @endif
                              @if($user->hasRole('operator')) Operator @endif
                          </td>
                          <td class="text-center">{{$user->name}}</td>
                          <td class="text-center">{{$user->email}}</td>
                          <td class="text-center">{{$user->created_at->format('d/m/y h:i A')}}</td>
                          <td class="text-center">@if($user->entry) {{ $user->entry->name }} @endif</td>
                          <td class="text-center">
                              @if($user->deleted_at)
                                  <span class="text-bold text-default">Inactive</span>

                              @else
                                  <span class="text-bold text-success">Active</span>

                              @endif
                          </td>
                          <td>
                            <div class="btn-group pull-right">
                              <form class="myAction" method="POST" action="{{URL::route('user.destroy',$user->id)}}">
                                <input name="_method" type="hidden" value="DELETE">
                                <input name="whatToDo" type="hidden" value="@if($user->deleted_at) Active @else Inactive @endif">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn ink-reaction btn-floating-action @if($user->deleted_at) btn-info @else btn-default @endif btn-sm" title="@if($user->deleted_at) Active @else Inactive @endif">
                                  <i class="fa fa-fw @if($user->deleted_at) fa-check @else fa-remove @endif"></i>
                                </button>
                              </form>
                              <a title="edit" href="{{URL::route('user.edit',$user->id)}}"  class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction"><i class="fa fa-pencil"></i></a>
                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->

                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end row -->

        </div>
      </section>
    </div>

  </section>


@endsection

@section('extraScript')
  <script>
      $( document ).ready(function() {
      });
  </script>
@endsection