<?php

namespace cs174\hw4\views;

class HomePage {
    function renderHome() {
        ?>
        <h1>Community Jigsaw</h1>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="a" value="addJigsaw" />
            <input type="hidden" name="b" value="addFile" />
            
            New Image: <input type="file" name="file" id="file" onchange="validate()" />
            <button>Upload</button>
        </form>

        <?php
    }
    
}
