const linkEdit = document.querySelectorAll('#linkEdit');
const in_email = document.querySelectorAll('#email');
const in_subjek = document.querySelectorAll('#subjek');
const in_pengaduan = document.querySelectorAll('#pengaduan');

linkEdit.forEach(element =>{
    element.addEventListener('click', ()=>{
        in_email.forEach(email=>{
            email.classList.toggle('d-none');
        });
        in_subjek.forEach(subjek =>{
            subjek.classList.toggle('d-none');
        });
        in_pengaduan.forEach(pengaduan =>{
            pengaduan.classList.toggle('d-none');
        });
    });
});