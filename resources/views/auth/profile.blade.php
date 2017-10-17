@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))

                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          @endif
                        @endforeach
                      </div> <!-- end .flash-message -->


                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('profile_update') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            
                            <label for="profile_pic" class="col-md-4 control-label">
                            
                                Update Profile Image
                            </label>
                            
                            
                            <div class="col-md-6">
                                
                                <img src="{{url('/uploads/avatars/'.$user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                                <input id="profile_pic" type="file" name="avatar">
                            
                            </div>

                        </div>
             

                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="fname" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autofocus>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Update Profile
                                </button>
                            </div>
                        </div>

                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')