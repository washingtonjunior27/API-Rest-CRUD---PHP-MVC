const updateUserForm = document.getElementById('updateUserForm');
const deleteUserForm = document.getElementById('deleteUserForm');

if(updateUserForm){
    updateUserForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const data = Object.fromEntries(formData.entries());

        const response = await fetch('api-user/update', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if(result.success){
            const alertHtml = `
            <div class="alert alert-success" role="alert">
                ${result.message}
            </div>
            `;
            document.getElementById('alert-container-update-user').innerHTML = alertHtml;

            setTimeout(() => {
                window.location.href = 'logout';
            }, 3000);
        }else{
            const alertHtml = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${result.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container-update-user').innerHTML = alertHtml;
        }
    })
}

if(deleteUserForm){
    deleteUserForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const data = Object.fromEntries(formData.entries());

        const response = await fetch('api-user/delete', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if(result.success){
            const alertHtml = `
            <div class="alert alert-success" role="alert">
                ${result.message}
            </div>
            `;
            document.getElementById('alert-container-delete-user').innerHTML = alertHtml;
            setTimeout(() => {
                window.location.href = 'logout';
            }, 3000);
        }else{
            const alertHtml = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${result.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container-delete-user').innerHTML = alertHtml;
        }
    })
}