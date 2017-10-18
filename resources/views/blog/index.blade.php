@include('layouts.header')

<style>
    .content{
        position: relative;
        top: 50px;
    }
</style>
    <div class="row">


        @foreach($posts as $post)
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h2><a href="{{url('/post/'.$post->id)}}">{{ $post->title }}</a>
                    <br>
                    
                </div>
                <div class="col-lg-12">
                    <p>{!! $post->summary !!}</p>
                </div>
               
            </div>
        @endforeach
     

    </div>

    <div class="pagination">
        {{$posts->links()}}
    </div>

@include('layouts.footer')

