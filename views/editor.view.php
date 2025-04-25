<?php

function editor() { ?>
    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <!-- Create the editor container -->
    <form action="" method="post">
        <div id="editor"></div>
        <!-- Hidden input to store the editor content -->
        <input type="hidden" name="postnya" id="postnya">
        <button type="submit" name="create_data">Submit</button>
    </form>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        let quill = new Quill('#editor', { theme: 'snow' });

        // Submit handler to set the hidden input value with editor content
        document.querySelector('form').addEventListener('submit', function() {
            let html = quill.root.innerHTML;
            document.getElementById('postnya').value = html; // Assign editor content to hidden input
        });
    </script>

<?php 
    // Check if form is submitted and display the editor content
    if (isset($_POST["create_data"])) {
        echo $_POST['postnya'];
    }
}
