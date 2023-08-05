(()=> {
    const form = document.querySelector('.search'); 

    if (form) {
        form.addEventListener('submit', buscarCliente); 
    }


    function buscarCliente(e) {
        e.preventDefault(); 

        const curp = e.target.querySelector('input').value; 

        if (curp) {
            window.location.href = `/curp/${curp}`; 
        }
    }

})(); 