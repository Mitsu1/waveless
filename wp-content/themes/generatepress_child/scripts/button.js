function move_right(element){

    var span = element.querySelector('span')

    if ( span ){

        var id = document.getElementById(span.id);
        var style = id.style;
        var left = parseInt(style.left, 10) || 0;
        var new_position = left + 10;

        id.dataset.original_position = style.left;
        id.style.left = new_position + "px";
    }
    
}
function move_original(element){

    var span = element.querySelector('span')

    if ( span ){
        var id = document.getElementById(span.id);
        id.style.left = id.dataset.original_position;
    }
}