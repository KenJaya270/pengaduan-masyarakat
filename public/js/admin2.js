const b_t_i_user = document.querySelector('#tambahPetugas');
const form = document.querySelector('#form');
const modalLabel = document.querySelector('#label');
const l_editUser = document.querySelectorAll('#editUser');
const i_username = document.querySelector('#username2');
const i_email = document.querySelector('#email');
const i_id_user = document.querySelector('#id_user');

b_t_i_user.addEventListener('click', ()=>{
    modalLabel.innerHTML = 'Tambah Petugas';
    form.setAttribute('action', 'http://localhost/pengaduan-masyarakat/public/admin/tambahPetugas');
});

l_editUser.forEach(editUser =>{
    editUser.addEventListener('click', ()=>{
        let id_user = editUser.getAttribute('data-id');
        let username = editUser.getAttribute('data-username');
        let email = editUser.getAttribute('data-email');

        modalLabel.innerHTML = 'Edit Petugas';
        form.setAttribute('action', 'http://localhost/pengaduan-masyarakat/public/admin/editPetugas');
        i_email.setAttribute('value', email);
        i_id_user.setAttribute('value', id_user);
        i_username.setAttribute('value', username);
    })
})