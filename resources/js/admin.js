require('./bootstrap');

const del = document.querySelectorAll('.del-plate');

del.forEach(item => {
    item.addEventListener('submit', function(event) {
        const message = confirm('Sei sicuro di voler eliminare il piatto?');

        if(!message){
            event.preventDefault();
        }
    })
});