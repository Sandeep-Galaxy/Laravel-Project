@include('layouts.admin.header')

<style type="text/css">
    .content{
        top: 250px;
        position: relative;
        }
</style>

<!-- Create new post -->
    <!-- New Task Form -->
    <!-- Display Validation Errors -->
        @include('common.errors')

        <form action="{{ url('admin/updatepost/'.$post[0]->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Post title -->
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Title</label>

                <div class="col-sm-6">
                    <input type="text" name="title" value="{{ $post[0]->title }}" id="title" class="form-control">
                </div>
            </div>

            <!-- Post Summary -->
            <div class="form-group">
                <label for="summary" class="col-sm-3 control-label">Summary</label>

                <div class="col-sm-6">
                    <textarea class="form-control" placeholder="" name="summary" cols="50" rows="10" id="summary">{{ $post[0]->summary }}</textarea>
                </div>
            </div>

            <!-- Post Content -->
            <div class="form-group">
                <label for="content" class="col-sm-3 control-label">Content</label>

                <div class="col-sm-6">
                    <textarea class="form-control" placeholder="" name="content" cols="50" rows="10" id="content">{{ $post[0]->content }}</textarea>
                </div>
            </div>

            <!-- Update Post Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Update Post
                    </button>
                </div>
            </div>
        </form>

@include('layouts.admin.footer')
