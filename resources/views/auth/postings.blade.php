@extends('auth.master')

@section('content')
<div>postings</div>

<ul>
	<li>Title<input type="text" name="title"></li>
	<li>Category<input type="text" name="category"></li>
	<li>Content<textarea></textarea></li>
	<li></li>
</ul>

<div class="codebox">
    <code>   
        var message = "hello world!";
        alert(message);
    </code>
</div>

<pre class="brush: php">
   &lt;?php
   echo "My first PHP script!";
   ?>
</pre>

<script type="text/javascript">
SyntaxHighlighter.all();
</script>

<style>
.codebox {
    /* Below are styles for the codebox (not the code itself) */
    border:1px solid black;
    background-color:#EEEEFF;
    width:300px;
    overflow:auto;    
    padding:10px;
}
.codebox code {
    /* Styles in here affect the text of the codebox */
    font-size:0.9em;
    /* You could also put all sorts of styling here, like different font, color, underline, etc. for the code. */
}

</style>

@endsection
