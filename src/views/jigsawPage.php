<?php

namespace cs174\hw4\views;

class JigsawPage {
    function renderJigsaw() {
        ?>
        <h1>Community Jigsaw</h1>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="a" value="addJigsaw" />
            <input type="hidden" name="b" value="addFile" />
            
            New Image: <input type="file" name="file" id="file" onchange="validate()" />
            <button>Upload</button>
        </form>
        
        <?php
            if(file_exists("./src/resources/puzzle.jpg")) {
                ?>
                <div class="puzzle-container">
                <?php 
                $serializedText = file_get_contents("./src/resources/active_image.txt");
                $perm = unserialize($serializedText);
                $count = 0;
                for($x = 0; $x < sqrt(sizeof($perm)); $x++) {
                    ?>
                    <div id="puzzle-row-<?=$x?>">
                    <?php
                    for($y = 0; $y < sqrt(sizeof($perm)); $y++) { 

                        ?>
                        <div class="piece" data-value="<?=$perm[$count]?>" id="puzzle-piece-<?=$perm[$count]?>" onclick="selected('puzzle-piece-<?=$perm[$count]?>');">

                        </div>
                        <?php
                        $count++;
                    }
                    ?>
                    </div>
                    <?php
                }
                ?>
                </div>
                <?php
            }
    }
    
    public function createPuzzle() {
        $serializedText = file_get_contents("./src/resources/active_image.txt");
        $perm = unserialize($serializedText);


    }
}
