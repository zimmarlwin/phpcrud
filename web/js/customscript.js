'use strict';
{
    const token = document.querySelector('.main').dataset.token;
    
    console.log(token);
    const doneClass = document.querySelectorAll('.done');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkboxbutton=>{
        checkboxbutton.addEventListener('change',() => {
            fetch('?action=checkbox_action', {
                method: 'POST',
                body: new URLSearchParams({
                    id: checkboxbutton.parentNode.dataset.id , 
                    token: token,
                }),
            });      
            
        });
    });

    const deletes = document.querySelectorAll('.delete');
    const removeDiv = document.querySelector('.remove');
    deletes.forEach(deletebutton =>{
        deletebutton.addEventListener('click',() => {
            if(!confirm('Are you sure?')){
                return;
            }
            fetch('?action=data_delete', {
                method: 'POST',
                body: new URLSearchParams({
                    id: deletebutton.parentNode.dataset.id , 
                    token: token,
                }),
            });  
            removeDiv.remove();        
        });
    });

    const purge = document.querySelector('.purge');  
    purge.addEventListener('click',() => {
        if(!confirm('Are you sure?')){
            return;
        } 
        fetch('?action=data_purge', {
            method: 'POST',
            body: new URLSearchParams({
                token: token,
            }),
        });

        const allDiv = document.querySelectorAll('.remove'); 
        allDiv.forEach(all=>{
            if(all.children[0].children[0].checked){
                all.remove();
            }
        });       
    });
}