import './bootstrap';

window.addEventListener('alert',(event)=>{
    let data=event.detail;
    console.log(data,"sfdfdfd")
    Swal.fire({
        position: data.position,
        icon: data.type,
        title:data.title,
        showConfirmButton: false,
        timer: 1500
      });

})

