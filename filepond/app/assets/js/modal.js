(()=> {
    const modal = document.querySelector('.alert'); 

    if (modal) {
        setTimeout(()=> {
            modal.remove(); 
        }, 3000)
    }
})(); 