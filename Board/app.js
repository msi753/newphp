const $editor = document.getElementById('editor');
if ($editor instanceof HTMLElement) {
    BalloonEditor.create($editor, {
        ckfinder: {
            uploadURL: '/Board/image/upload.php'
        }
    }).then(editor => {
        editor.editing.view.focus();
        const $form = document.querySelector('#main__form-post > form');
        $form.addEventListener('submit', e => {
            const data = document.createTextNode(editor.getData())
            document.querySelector('#main__form-post textarea[name=content]').appendChild(data)
        });
    });
}