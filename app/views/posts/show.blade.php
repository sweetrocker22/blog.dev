@extends('layouts.postsmaster')
<link href="/webpage_ext/css/main.css" rel="stylesheet">

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12" style="padding-bottom: 15px;">
      <h1>{{{ $post->title }}}</h1>
      <hr>
      <h4>{{{ $post->user->email }}}</h4>
      <h4>{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i A') }}}</h4>
      <p>{{{ $post->body }}}</p>
      @if ($post->img_path)
       <img class="img-responsive" src="{{{ $post->img_path }}}"/>
      @endif
      <br>
      @if (Auth::check()) 
       {{ link_to_action('PostsController@edit', 'Edit this Post', $post->id, array('class'=> 'btn btn-primary')) }}
       {{ link_to_action('PostsController@destroy', 'Delete', $post->id, array('class'=> 'btn btn-danger deletePost')) }}
      @endif
      <!--Comment Area-->
      <div id="disqus_thread"></div>
      <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'caitlindaily'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    </div>
  </div>
</div>
<!--Hidden delete form-->
{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'id' => 'deleteForm', 'method' => 'delete')) }}
{{ Form::close() }}
<!--Script for deleting post-->
<script type="text/javascript">
$(".deletePost").click(function(e) {
  e.preventDefault();
   if(confirm("Are you sure you want to delete this post?")) {
       $('#deleteForm').submit();
   }
});
</script>

@stop