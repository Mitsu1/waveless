function move_right(element){

    let span = element.querySelector('span')

    if ( span ){

        let id = document.getElementById(span.id);
        let style = id.style;
        let left = parseInt(style.left, 10) || 0;
        let new_position = left + 10;
        id.dataset.original_position = style.left;
        id.style.left = new_position + "px";
        
    }
    
}

function move_original(element){

    let span = element.querySelector('span')

    if ( span ){
        let id = document.getElementById(span.id);
        id.style.left = id.dataset.original_position;
    }
}