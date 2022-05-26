'use strict';
{
    const doneClass = document.querySelectorAll('.done');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkboxbutton=>{
        checkboxbutton.addEventListener('change',() => {
            fetch('?action=checkbox_action', {
                method: 'POST',
                body: new URLSearchParams({
                    id: checkboxbutton.dataset.id , 
                    token: checkboxbutton.dataset.token,
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
                    id: deletebutton.dataset.id , 
                    token: deletebutton.dataset.token,
                }),
            });  
            removeDiv.remove();        
        });
    });
    
   
    
    const purge = document.querySelector('.purge');  
    const allDiv = document.querySelectorAll('.remove');   
  
    purge.addEventListener('click',() => {
        if(!confirm('Are you sure?')){
            return;;
        }
        fetch('?action=data_purge', {
            method: 'POST',
            body: new URLSearchParams({
                token: purge.dataset.token,
            }),
        }); 
    allDiv.forEach(all=>{
        if(all.children[0].checked){
            all.remove();
        }
    })
    
});

}