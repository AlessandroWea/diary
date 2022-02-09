<div class="wrapper-view">
	<h1 id="view-header">Diary for <?=$writing['date_of_creation'];?></h1>
	<h2 id="view-preview">Preview: <?=$writing['preview']?></h2>
	<hr id="line">
	<div id="editor"></div>
</div>

<script>
	
let editor;

ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( _editor => {
            editor = _editor;
            editor.setData(`<?=$writing['content']?>`);
    } )
    .catch( error => {
            console.error( error );
    } );

</script>