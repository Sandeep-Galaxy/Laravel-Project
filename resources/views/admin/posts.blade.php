@include('layouts.admin.header')

<style>

.content{
    
    position: relative;
    top: 40px;
}

</style>
<!-- Current Tasks -->
    @if (count($posts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Posts</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $post->title }}</div>
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('admin/post/'.$post->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $post->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete Post
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    @endif

    <div class="col-lg-12">
        <a href="{{url('admin/newpost')}}" class="btn btn-info pull-right">Add a post</a>
    </div>


@include('layouts.admin.footer')
