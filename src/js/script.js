

function selected(id) {
    var element = document.getElementById(id);
    var tiles = document.querySelectorAll(".piece");
    if(element.style.border == "") {
        element.style.border = "solid";
    }
    else if(element.style.border == "solid") {
        element.style.border = "";
    }
    var swapTile = [];
    for(var i = 0; i < tiles.length; i++) {
        if(swapTile.length == 2) {
            swap(swapTile[0], swapTile[1]);

            break;
        }
        if(tiles[i].style.border == "solid") {
            swapTile.push(tiles[i]);
        }
    }
    
}

function swap(tile1, tile2) {
    var parent1 = tile1.parentNode; //row-0

    var sibling1 = tile1.nextSibling === tile2 ? tile1 : tile1.nextSibling;
    console.log(sibling1);
    // var tile1_value = tile1["attributes"]["data-value"]["value"];
    // var tile2_value = tile2["attributes"]["data-value"]["value"];
    
    tile2.parentNode.insertBefore(tile1, tile2);
    parent1.insertBefore(tile2, sibling1);

    tile1.style.border = "";
    tile2.style.border = "";

    // var newTile = document.createElement("div");
    // newTile.setAttribute("class", "piece");
    // newTile.setAttribute("data-value", tile1_value);
    // newTile.setAttribute("id", "puzzle-piece-" . tile1_value);
    // newTile.setAttribute("onclick", "selected(" + tile1_value + ")");

    // tile1.parentNode.replaceChild(tile2, tile1);
    // tile2.parentnode.replaceChild(newTile, tile2);
}



//File Validation for size and type of file

function validate() {
    var file = document.getElementById('file').files[0];
    var allowed_extensions = new Array("jpg","png","gif");
    var file_extension = file.name.split('.').pop().toLowerCase();

    if(file.size > 2097152) {
        alert("File size is too large");
        return false;
    }

    for(var i = 0; i < allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            return true;    
        }
    }
    alert("File extension must be .jpg, .png, or .gif");
    return false;
}



