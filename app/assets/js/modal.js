(()=> {
    const modal = document.querySelector('.modal'); 

    if (modal) {
        setTimeout(()=> {
            modal.remove(); 
        }, 3000)
    }
})(); 