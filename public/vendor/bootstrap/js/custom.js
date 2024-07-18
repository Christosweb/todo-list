/**
 * add task to database functionality
 * request sent is task input value
 */
document.addEventListener('DOMContentLoaded', function()
{
const add = document.getElementById("add");
if (add) {
   add.addEventListener('click',function(e)
{
    e.preventDefault();

    const task = document.getElementById("task").value
    
    
    const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
   
    const xhr = new XMLHttpRequest();
          xhr.onload = function()
          {
             
            
               const res = this.responseText
               const resToStr = JSON.parse(res)

               if (resToStr.success) {
               document.getElementById("modal").style.display='block' ;
               document.getElementById('status').innerText='success' ;
               document.getElementById('message').innerText=resToStr.success ;
               document.getElementById("close").addEventListener('click',function()
            {
               window.location.reload();
            })
               }

               if (resToStr.fail) {
                   document.getElementById("modal").style.display='block' ;
               document.getElementById('status').innerText='fail' ;
               document.getElementById('message').innerText=resToStr.fail ;
               document.getElementById("close").addEventListener('click',function()
            {
               window.location.reload();
            })
               }
               

          }
          
          xhr.open('POST', 'todo',true);
          xhr.setRequestHeader('Content-Type' ,'application\json');

          
          xhr.setRequestHeader('X_CSRF-TOKEN', csrf_token);

          xhr.send(JSON.stringify(task));

          document.getElementById("task").value = " ";
       
})
}
})


function checkbox()
{
   const checkboxes = document.querySelectorAll("input[type='checkbox']");

   if (checkboxes) {
      checkboxes.forEach(checkbox => {
         checkbox.addEventListener('change', function(event)
         {
            const isChecked = event.target.checked;
            if(isChecked){
               //store to database
               ischeckboxRequest(event.target.value)
            }else{
               //remove from database
               unCheckboxRequest(event.target.value)
            }
         })
      });
   }
}checkbox()

function ischeckboxRequest(checked)
{
   const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
   const xhr = new XMLHttpRequest();
          xhr.onload = function()
          {
            //  console.log(this.responseText)
          }
          
          xhr.open('POST', 'checkbox',true);
          xhr.setRequestHeader('Content-Type' ,'application\json');

          
          xhr.setRequestHeader('X_CSRF-TOKEN', csrf_token);

          xhr.send(JSON.stringify(checked));
}

function unCheckboxRequest(unChecked)
{
   const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
   const xhr = new XMLHttpRequest();
          xhr.onload = function()
          {
            //  console.log(this.responseText)
          }
          
          xhr.open('POST', 'uncheckbox',true);
          xhr.setRequestHeader('Content-Type' ,'application\json');

          
          xhr.setRequestHeader('X_CSRF-TOKEN', csrf_token);

          xhr.send(JSON.stringify(unChecked));
}

/**
* update task functionality
*/
function updateTask()
{
   const update = document.getElementById("update")
   if(!update){
    return false;
   }

   update.addEventListener("click", function(event)
   {
        event.preventDefault();
        const inputValue = document.getElementById('task').value
        const routeUrl = document.getElementById('update').getAttribute("data-edit")

        const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
   const xhr = new XMLHttpRequest();
          xhr.onload = function()
          {
             const res = this.responseText ;
             const resToStr = JSON.parse(res);
             
             if (resToStr.error) {
               document.getElementById("modal").style.display='block' ;
               document.getElementById('status').innerText='failed' ;
               document.getElementById('message').innerText=resToStr.error ;
               document.getElementById("close").addEventListener('click',function()
            {
               window.location.reload();
            })
               }else{
                  document.getElementById("modal").style.display='block' ;
               document.getElementById('status').innerText='success' ;
               document.getElementById('message').innerText=resToStr.message ;
               document.getElementById("close").addEventListener('click',function()
            {
               window.location.reload();
            })
               }
          }
          
          xhr.open('PATCH', routeUrl, true);
          xhr.setRequestHeader('Content-Type', 'application\json');

          
          xhr.setRequestHeader('X_CSRF-TOKEN', csrf_token);

          xhr.send(JSON.stringify(inputValue));
   })
}updateTask();


/**
 * 
 * delete tasks functionality
 */

function deleteTask()
{
   const delete_btn = document.querySelectorAll(".delete")
   if(!delete_btn){
    return false;
   }

   delete_btn.forEach(delete_btn => {
      
      delete_btn.addEventListener("click", function(event)
   {
      //   event.preventDefault();

        const routeUrl = event.target.getAttribute("data-delete")

        const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
   const xhr = new XMLHttpRequest();
          xhr.onload = function()
          {
            //  console.log(this.responseText)
            //  const res = JSON.parse(this.responseText);
            window.location.reload();
          }
          
          xhr.open('DELETE', routeUrl, true);
          xhr.setRequestHeader('Content-Type', 'application\json');

          
          xhr.setRequestHeader('X_CSRF-TOKEN', csrf_token);

          xhr.send();
   })


   });

   
}deleteTask();

