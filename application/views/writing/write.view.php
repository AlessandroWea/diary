<div class="wrapper-write">
	<h1>Write your day!</h1>
	<div class="editor-box">
		<div id="editor"></div>
	</div>
	<button class="save-btn">Save!</button>
</div>

<script>

let editor;

ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( _editor => {
            editor = _editor;
    } )
    .catch( error => {
            console.error( error );
    } );

document.querySelector('.save-btn').addEventListener('click', () => {
    let formData = new FormData();

    formData.append('content', editor.getData());
    formData.append('preview', '12345');

    sendRequest('POST', SERVER_PATH + 'save', formData)
        .then(response => {
            if(response.response == 'ok')
            {
                window.location.href = SERVER_PATH;
            }
            else
            {
                console.log('bad');
            }

        });

})



</script>