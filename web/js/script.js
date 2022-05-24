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
            deletebutton.parentNode.submit();
        });
    });
}