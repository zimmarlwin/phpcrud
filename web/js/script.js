'use strict';
{
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkboxbutton=>{
        checkboxbutton.addEventListener('change',() => {
            checkboxbutton.parentNode.submit();
        });
    });

    const deletes = document.querySelectorAll('.delete');
    deletes.forEach(deletebutton =>{
        deletebutton.addEventListener('click',() => {
            if(!confirm('Are you sure?')){
                return;
            }
            deletebutton.parentNode.submit();
        });
    });

    const purge = document.querySelector('.purge');    
    purge.addEventListener('click',() => {
        if(!confirm('Are you sure?')){
            return;
        }
        purge.parentNode.submit();
    });

}